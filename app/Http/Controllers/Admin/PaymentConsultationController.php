<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use App\Models\PaymentConsultation;
use App\Http\Controllers\Controller;

class PaymentConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentConsultation $paymentConsultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = PaymentConsultation::with('users:id,name', 'psychologists:id,name')->where('consultation_id', $id)->firstOrFail();

        return view('admin.consultation-detail', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'total_price' => 'integer',
            'status' => 'in:paid,unpaid',
        ]);

        $paymentUpdate = PaymentConsultation::updateOrCreate(['consultation_id' => $id], $request->all());
        return redirect('/admin/show-consultation/' . $id)->with('success', "Detail Consultation $paymentUpdate->psychologist_id Updated Successfully!")->withErrors($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentConsultation $paymentConsultation)
    {
        //
    }
}
