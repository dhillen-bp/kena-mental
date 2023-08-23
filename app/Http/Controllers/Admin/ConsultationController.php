<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MoneyFormatHelper;
use App\Models\User;
use App\Models\Consultation;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentConsultation;
use App\Http\Controllers\Controller;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::with(['paymentConsultation', 'users', 'psychologists'])->paginate(10);
        return view('admin.consultations', compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        $psychologists = Psychologist::select('id', 'name')->get();
        return view('admin.consultation-add', compact('users', 'psychologists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'psychologist_id' => 'required',
            'notes' => 'nullable',
            'booking_date' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $consultation = Consultation::create($validated);

            $paymentData = [
                'consultation_id' => $consultation->id,
                'user_id' => $consultation->users->id,
                'psychologist_id' => $consultation->psychologists->id,
                'total_price' => 200000,
            ];

            $paymentConsultation = PaymentConsultation::create($paymentData);

            DB::commit();

            return redirect('/admin/consultations')->with('success', "Consultation and Payment Added Successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            $errorMessage = $e->getMessage();
            return redirect('/admin/add-consultation')->with('error', "Error at $errorMessage");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $consultation = Consultation::with(['paymentConsultation', 'users', 'psychologists'])->find($id);
        $amount = $consultation->paymentConsultation->total_price;
        $formattedAmount = MoneyFormatHelper::formatRupiah($amount);

        return view('admin.consultation-show', compact('consultation', 'formattedAmount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $consultation = Consultation::find($id);
        $users = User::select('id', 'name')->get();
        $psychologists = Psychologist::select('id', 'name')->get();
        return view('admin.consultation-edit', compact('consultation', 'users', 'psychologists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $selectedConsultation = Consultation::find($id);
            $consultation = $selectedConsultation->update($request->all());

            $paymentData = [
                'user_id' => $request['user_id'],
                'psychologist_id' => $request['psychologist_id'],
            ];

            $selectedPaymentConsultation = PaymentConsultation::where('consultation_id', $id)->firstOrFail();
            $paymentConsultation = $selectedPaymentConsultation->update($paymentData);

            DB::commit();

            return redirect('/admin/show-consultation/' . $id)->with('success', "Consultation and Payment Updated Successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            $errorMessage = $e->getMessage();
            return redirect('/admin/edit-consultation/' . $id)->with('error', "Error at $errorMessage");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consultation = Consultation::find($id);
        $consultation->delete();

        $paymentConsultation = PaymentConsultation::where('consultation_id', $id)->first();
        if ($paymentConsultation) {
            $paymentConsultation->delete();
        }

        return redirect('/admin/consultations')->with('success', 'Consultation Deleted Successfully!');
    }

    public function showDeletedConsultations()
    {
        $deletedConsultations = Consultation::with(['paymentConsultation' => function ($query) {
            $query->withTrashed();
        }])->onlyTrashed()->paginate(10);
        return view('admin.consultation-deleted', compact('deletedConsultations'));
    }

    public function restore($id)
    {
        $consultation = Consultation::with(['paymentConsultation' => function ($query) {
            $query->withTrashed();
        }])->onlyTrashed()->where('id', $id)->firstOrFail();

        if ($consultation->paymentConsultation) {
            $consultation->paymentConsultation->restore();
        }
        $consultation->restore();

        return redirect('/admin/consultations')->with('success', 'Consultation Restored Successfully!');
    }

    public function destroyPermanent($id)
    {
        $deletedConsultation = Consultation::with(['paymentConsultation' => function ($query) {
            $query->withTrashed();
        }])->onlyTrashed()->first();

        if ($deletedConsultation->paymentConsultation) {
            $deletedConsultation->paymentConsultation->forceDelete();
        }

        $deletedConsultation->forceDelete();

        return redirect('/admin/deleted-consultations')->with('success', 'Consultation Deleted Permanent Successfully!');
    }
}
