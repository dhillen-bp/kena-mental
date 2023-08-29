<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Support\Str;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use App\Models\PsychologistDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PsychologistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $psychologists = Psychologist::with('psychologistDetail')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('psychologistDetail', function ($query) use ($keyword) {
                $query->where('topics', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('university', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(10);

        return view('admin.psychologists', compact('psychologists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $psychologist_id = IdGenerator::generate(['table' => 'psychologists', 'length' => 4, 'prefix' => 'P']);
        return view('admin.psychologist-add', compact('psychologist_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:psychologists',
            'name' => 'required|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'biography' => 'max:255',
        ]);

        $imageName = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::uuid() . '.' . $imageExtension;
            $image->storeAs("images/psychologist_photo", $imageName);
        }

        $validated['photo'] = $imageName;
        // return var_dump($request->all());

        $psychologist = Psychologist::create($validated);
        return redirect('/admin/psychologists')->with('success', "Psychologist $psychologist->name Added Successfully!")->withErrors($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $psychologist = Psychologist::with(['psychologistDetail',])
            ->where('id', $id)
            ->firstOrFail();
        return view('admin.psychologist-show', ['psychologist' => $psychologist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $psychologist = Psychologist::where('id', $id)->firstOrFail();
        return view('admin.psychologist-edit', ['psychologist' => $psychologist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'biography' => 'max:255',
        ]);

        $imageName = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::uuid() . '.' . $imageExtension;
            $image->storeAs("images/psychologist_photo", $imageName);
        }

        $validated['photo'] = $imageName;

        $psychologist = Psychologist::where('id', $id)->firstOrFail();
        $deletePhoto = Storage::disk('public')->delete('images/psychologist_photo/' . $psychologist->photo);

        $psychologistUpdate = $psychologist->update($validated);
        return redirect('/admin/psychologists')->with('success', "Psychologist $psychologist->name Updated Successfully!")->withErrors($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $psychologist = Psychologist::find($id);
        $psychologist->delete();

        $psychologistDetail = PsychologistDetail::where('psychologist_id', $id)->first();
        if ($psychologistDetail) {
            $psychologistDetail->delete();
        }

        return redirect('/admin/psychologists')->with('success', 'Psychologist Deleted Successfully!');
    }

    public function showDeletedPsychologists()
    {
        $deletedPsychologists = Psychologist::with(['psychologistDetail' => function ($query) {
            $query->withTrashed();
        }])->onlyTrashed()->paginate(10);
        return view('admin.psychologist-deleted', ['deletedPsychologists' => $deletedPsychologists]);
    }

    public function destroyPermanent($id)
    {
        $deletedPsychologist = Psychologist::with(['psychologistDetail' => function ($query) {
            $query->withTrashed();
        }])->onlyTrashed()->first();

        if ($deletedPsychologist->psychologistDetail) {
            $deletedPsychologist->psychologistDetail->forceDelete();
        }

        $deletedPsychologist->forceDelete();
        $deletePhoto = Storage::disk('public')->delete('images/psychologist_photo/' . $deletedPsychologist->photo);

        return redirect('/admin/deleted-psychologists')->with('success', 'Psychologist Deleted Permanent Successfully!');
    }


    public function restore($id)
    {
        $psychologist = Psychologist::with(['psychologistDetail' => function ($query) {
            $query->withTrashed();
        }])->onlyTrashed()->where('id', $id)->firstOrFail();

        if ($psychologist->psychologistDetail) {
            $psychologist->psychologistDetail->restore();
        }
        $psychologist->restore();

        return redirect('/admin/psychologists')->with('success', 'Psychologist Restored Successfully!');
    }
}
