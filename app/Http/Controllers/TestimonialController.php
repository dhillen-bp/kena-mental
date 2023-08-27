<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'psychologist_id' => 'required',
            'content' => 'required',
        ]);

        $testimonial = Testimonial::create($validated);
        return redirect('/testimonials')->with('success', "Testimonial Added Successfully!")->withErrors($validated);
    }
}
