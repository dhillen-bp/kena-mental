<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Consultation;
use App\Models\Psychologist;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ConsultationController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $consultation = Consultation::where('user_id', $userId)
            ->whereHas('paymentConsultation', function ($query) {
                $query->where('status', 'paid');
            })
            ->get();

        foreach ($consultation as $consult) {
            $consult->notes = Str::limit($consult->notes, $limit = 50, $end = '...');
        }

        $message = $consultation->isEmpty() ? 'Consultation is Empty!' : '';

        return view('client.consultation',  ['consultation' => $consultation, 'message' => $message]);
    }

    public function consultDetail($id)
    {
        $consultation = Consultation::with(['users', 'psychologists'])
            ->where('id', $id)
            ->whereHas('paymentConsultation', function ($query) {
                $query->where('status', 'paid');
            })
            ->firstOrFail();

        return view('client.consultation-detail',  ['consultation' => $consultation]);
    }

    public function exportPDF($id)
    {
        $consultation = Consultation::with(['users', 'psychologists'])->where('id', $id)->firstOrFail();
        $consultationArray = $consultation->toArray();

        $pdf = PDF::loadView('components.export-pdf', ['consultationArray' => $consultationArray]);
        return $pdf->download('consultation-detail.pdf');
    }

    public function create($psychologist_id)
    {
        $user_id = Auth::user()->id;
        $user = User::select('id', 'name')->where('id', $user_id)->firstOrFail();
        $psychologist = Psychologist::select('id', 'name')->where('id', $psychologist_id)->firstOrFail();
        return view('client.form-consultation',  ['user' => $user, 'psychologist' => $psychologist]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'psychologist_id' => 'required',
            'booking_date' => 'required',
        ]);

        $existingConsultation = Consultation::where('psychologist_id', $validatedData['psychologist_id'])
            ->where('booking_date', $validatedData['booking_date'])
            ->first();

        if ($existingConsultation) {
            return back()->with('error', 'A consultation with the same psychologist and booking date already exists.');
        }

        $consultation = Consultation::create($request->all());

        return redirect("/payment-consultation/$consultation->id");
    }
}
