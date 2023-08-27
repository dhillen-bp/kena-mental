<?php

namespace App\Http\Controllers\Psychologist;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class DashboardController extends Controller
{
    public function index()
    {
        $loggedInPsychologist = auth('admin')->user()->psychologist_id;
        $consultationUpcoming = Consultation::where('booking_date', '>=', now())
            ->where('psychologist_id', $loggedInPsychologist)
            ->whereHas('paymentConsultation', function ($query) {
                $query->where('status', 'paid');
            })
            ->get();

        $consultationCompleted = Consultation::where('booking_date', '<=', now())
            ->where('psychologist_id', $loggedInPsychologist)
            ->whereHas('paymentConsultation', function ($query) {
                $query->where('status', 'paid');
            })
            ->get();

        $countUpcoming = count($consultationUpcoming);
        $countCompleted = count($consultationCompleted);

        return view('psychologist.dashboard', compact('countUpcoming', 'countCompleted'));
    }
}
