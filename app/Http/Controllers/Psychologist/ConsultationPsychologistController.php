<?php

namespace App\Http\Controllers\Psychologist;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationPsychologistController extends Controller
{
    public function showUpcoming()
    {
        $loggedInPsychologist = auth('admin')->user()->psychologist_id;
        $consultations = Consultation::with('users:id,name', 'psychologists:id,name')->where('booking_date', '>=', now())
            ->where('psychologist_id', $loggedInPsychologist)
            ->whereHas('paymentConsultation', function ($query) {
                $query->where('status', 'paid');
            })->orderBy('booking_date', 'desc')
            ->paginate(10);
        return view('psychologist.consultation-upcoming', compact('consultations'));
    }
    public function showCompleted()
    {
        $loggedInPsychologist = auth('admin')->user()->psychologist_id;
        $consultations = Consultation::with('users:id,name', 'psychologists:id,name')->where('booking_date', '<=', now())
            ->where('psychologist_id', $loggedInPsychologist)
            ->whereHas('paymentConsultation', function ($query) {
                $query->where('status', 'paid');
            })->orderBy('booking_date', 'desc')
            ->paginate(10);
        return view('psychologist.consultation-completed', compact('consultations'));
    }

    public function updateCompleted(Request $request, $id)
    {
        $request->validate([
            'notes' => 'required|string',
        ]);

        // Cari konsultasi berdasarkan ID
        $consultation = Consultation::findOrFail($id);

        // Update hanya bagian "notes"
        $consultation->update([
            'notes' => $request->input('notes'),
        ]);

        return redirect()->back()->with('success', 'Notes has been updated successfully.');
    }
}
