<?php

namespace App\Http\Controllers;

use App\Models\Psychologist;
use Illuminate\Http\Request;

class PsychologistController extends Controller
{
    public function index()
    {
        $psychologists = Psychologist::paginate(6);
        return view('client.psychologists', [
            'psychologists' => $psychologists
        ]);
    }

    public function show($id)
    {
        $psychologist = Psychologist::with(['psychologistDetail', 'consultations.paymentConsultation'])
            ->whereHas('consultations.paymentConsultation', function ($query) {
                $query->where('status', 'paid');
            })
            ->where('id', $id)
            ->firstOrFail();
        return view('client.psychologist-detail', ['psychologist' => $psychologist]);
    }

    // just for unit test
    public static function isPsycholog()
    {
        return true;
    }

    // ADMIN
    public function showAdmin()
    {
        $psychologists = Psychologist::with('psychologistDetail')->paginate(10);
        return view('admin.psychologists', compact('psychologists'));
    }
}
