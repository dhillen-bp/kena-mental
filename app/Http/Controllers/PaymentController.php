<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Consultation;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use App\Models\PsychologistDetail;
use App\Models\PaymentConsultation;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function create($id)
    {
        $consultation = Consultation::where('id', $id)->firstOrFail();
        $psychologist = Psychologist::where('id', $consultation->psychologist_id)->firstOrFail();
        $user = User::where('id', $consultation->user_id)->firstOrFail();

        return view('client.payment-consultation',  compact('user', 'psychologist', 'consultation'));
    }

    public function store(Request $request)
    {

        $payment = PaymentConsultation::create($request->all());
        $userName = $request->input('name');
        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $payment->id,
                'gross_amount' => $payment->total_price,
            ),
            'customer_details' => array(
                'first_name' => $userName,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return  view('components.confirm-payment', compact('snapToken', 'payment'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed === $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                $payment = PaymentConsultation::where('id', $request->order_id)->firstOrFail();
                $payment->update(['status' => 'paid']);

                $psychologistDetail = PsychologistDetail::where('psychologist_id', $payment->psychologist_id)->firstOrFail();
                if ($psychologistDetail) {
                    $psychologistDetail->increment('session_count');
                }
            }
        }
    }

    public function invoice($id)
    {
        $payment = PaymentConsultation::with(['consultation'])->where('id', $id)->firstOrFail();
        return view('components.invoice-consultation', compact('payment'));
    }
}
