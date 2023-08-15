<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Consultation;
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

    // not fix
    public function showPackage()
    {
        return view('client.choose-package');
    }

    public function choosePackage(Request $request)
    {
        $packagePrice = $request->input('package_price');
        $sessionType = $request->input('session_type');

        Session::put('selected_package_price', $packagePrice);
        Session::put('selected_session_type', $sessionType);

        return redirect()->route('confirm-booking');
    }
}
