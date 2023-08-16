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
        $consultation = Consultation::where('user_id', $userId)->get();

        foreach ($consultation as $consult) {
            $consult->notes = Str::limit($consult->notes, $limit = 50, $end = '...');
        }

        return view('client.consultation',  ['consultation' => $consultation]);
    }

    public function consultDetail($id)
    {
        $consultation = Consultation::with(['users', 'psychologists'])->where('id', $id)->firstOrFail();
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
            'booking_date' => 'required|date',
        ]);

        $consultation = new Consultation();
        // $consultation->user_id = $validatedData['user_id'];
        // $consultation->psychologist_id = $validatedData['psychologist_id'];
        // $consultation->booking_date = $validatedData['booking_date'];

        $consultation = Consultation::create($request->all());
    }
}
