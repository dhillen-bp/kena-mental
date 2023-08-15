<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Consultation;
use Illuminate\Http\Request;
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

    public function consultDetail()
    {
        $userId = Auth::user()->id;
        $consultation = Consultation::with(['users', 'psychologists'])->where('user_id', $userId)->firstOrFail();
        return view('client.consultation-detail',  ['consultation' => $consultation]);
    }

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
