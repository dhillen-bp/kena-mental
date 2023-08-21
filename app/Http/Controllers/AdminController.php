<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Psychologist;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $psychologistCount = Psychologist::count();
        $consultationCount = Consultation::count();
        $testimonialCount = Testimonial::count();
        return view('admin.dashboard', compact('userCount', 'psychologistCount', 'consultationCount', 'testimonialCount'));
    }
}
