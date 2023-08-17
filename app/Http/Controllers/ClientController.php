<?php

namespace App\Http\Controllers;

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
        return view('client.mental-test');
    }

    public function testimonial()
    {
        $testimonials = Testimonial::with(['user', 'psychologist'])->get();
        return view('client.testimonial', compact('testimonials'));
    }
}
