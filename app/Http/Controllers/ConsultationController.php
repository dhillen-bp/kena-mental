<?php

namespace App\Http\Controllers;

use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConsultationController extends Controller
{
    public function index()
    {
        return view('client.consultation');
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
