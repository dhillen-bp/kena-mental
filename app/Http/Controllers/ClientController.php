<?php

namespace App\Http\Controllers;

use App\Models\MentalTest;
use App\Models\Psychologist;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function mentalTest()
    {
        $tests = MentalTest::get();
        return view('client.mental-test', compact('tests'));
    }

    public function testimonial()
    {
        $psychologists = Psychologist::get();
        $testimonials = Testimonial::with(['user', 'psychologist'])->get();
        return view('client.testimonial', compact('testimonials', 'psychologists'));
    }
}
