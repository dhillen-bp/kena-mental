<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Testimonial;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $testimonials = Testimonial::with(['user:id,name', 'psychologist:id,name'])
            ->where('content', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('psychologist', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(10);
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        $psychologists = Psychologist::select('id', 'name')->get();
        return view('admin.testimonial-add', compact('users', 'psychologists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'psychologist_id' => 'required',
            'content' => 'required',
        ]);

        $testimonial = Testimonial::create($validated);
        return redirect('/admin/testimonials')->with('success', "Testimonial Added Successfully!")->withErrors($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        $users = User::select('id', 'name')->get();
        $psychologists = Psychologist::select('id', 'name')->get();
        return view('admin.testimonial-edit', compact('testimonial', 'users', 'psychologists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'role'  => 'required',
            'psychologist_id' => 'nullable'
        ]);

        $testimonial = Testimonial::find($id);
        $testimonialUpdate = $testimonial->update($validated);
        return redirect('/admin/testimonials')->with('success', "Testimonial  Updated Successfully!")->withErrors($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return redirect('/admin/testimonials')->with('success', 'Testimonial Deleted Successfully!');
    }

    public function showDeletedTestimonials()
    {
        $deletedTestimonials = Testimonial::with(['user:id,name', 'psychologist:id,name'])->onlyTrashed()->paginate(10);
        return view('admin.testimonial-deleted', compact('deletedTestimonials'));
    }

    public function restore($id)
    {
        $testimonial = Testimonial::onlyTrashed()->where('id', $id)->firstOrFail();

        $testimonial->restore();

        return redirect('/admin/testimonials')->with('success', 'Testimonial Restored Successfully!');
    }

    public function destroyPermanent($id)
    {
        $deletedTestimonial = Testimonial::onlyTrashed()->where('id', $id)->firstOrFail();

        $deletedTestimonial->forceDelete();

        return redirect('/admin/deleted-testimonials')->with('success', 'Testimonial Deleted Permanent Successfully!');
    }
}
