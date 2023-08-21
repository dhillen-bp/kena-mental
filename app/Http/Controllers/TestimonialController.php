<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function showAdmin()
    {
        $testimonials = Testimonial::with(['user:id,name', 'psychologist'])->paginate(10);
        return view('admin.testimonials', compact('testimonials'));
    }
}
