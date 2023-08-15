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
        $psychologist = Psychologist::with(['psychologistDetail', 'consultations'])->where('id', $id)->firstOrFail();
        return view('client.psychologist-detail', ['psychologist' => $psychologist]);
    }

    public function choosePsychologist(Request $request, $id)
    {
        $psychologist = Psychologist::with(['psychologistDetail'])->where('id', $id)->firstOrFail();
        session(['selected_psychologist' => $psychologist]);

        // Redirect to choose-package page
        return redirect()->route('choose-package');
    }
}
