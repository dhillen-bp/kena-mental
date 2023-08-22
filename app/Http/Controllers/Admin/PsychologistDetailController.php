<?php

namespace App\Http\Controllers\Admin;

use App\Models\Psychologist;
use Illuminate\Http\Request;
use App\Models\PsychologistDetail;
use App\Http\Controllers\Controller;

class PsychologistDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PsychologistDetail $psychologistDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $psychologist = Psychologist::with(['psychologistDetail'])->where('id', $id)->firstOrFail();
        return view('admin.psychologist-detail', compact('psychologist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'university' => 'max:255',
            'year' => 'integer|between:1900,' . date('Y'),
            'degree' => 'max:255',
            'topics' => 'max:255',
        ]);

        $psychologistUpdate = PsychologistDetail::updateOrCreate(['psychologist_id' => $id], $validated);
        return redirect('/admin/show-psychologist/' . $id)->with('success', "Detail Psychologist $psychologistUpdate->psychologist_id Updated Successfully!")->withErrors($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PsychologistDetail $psychologistDetail)
    {
        //
    }
}
