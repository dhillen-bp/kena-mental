<?php

namespace App\Http\Controllers\Admin;


use App\Models\Question;
use App\Models\MentalTest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TestMentalController extends Controller
{
    public function index()
    {
        $tests = MentalTest::get();
        return view('admin.mental-test', compact('tests'));
    }

    public function create()
    {
        $test_id = IdGenerator::generate(['table' => 'mental_tests', 'length' => 5, 'prefix' => 'TS']);
        return view('admin.mental-test-add', compact('test_id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:mental-test',
            'title' => 'required|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'desc' => 'max:255',
        ]);

        $imageName = '';
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = $validated['id'] . '.' . $imageExtension;
            $image->storeAs("images/test_img", $imageName);
        }

        $validated['thumbnail'] = $imageName;
        // return var_dump($request->all());

        $test = MentalTest::create($validated);
        return redirect('/admin/mental-test')->with('success', "MentalTest $test->title Added Successfully!")->withErrors($validated);
    }

    public function edit($id)
    {
        $test = MentalTest::find($id);
        return view('admin.mental-test-edit', compact('test'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id' => 'required|unique:mental-test',
            'title' => 'required|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'desc' => 'max:255',
        ]);

        $test = MentalTest::find($id);
        $oldPhoto = $test->thumbnail;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageExtension = $image->getClientOriginalExtension();
            $oldPhoto = $validated['id'] . '.' . $imageExtension;
            $image->storeAs("images/test_img", $oldPhoto);

            $deletePhoto = Storage::disk('public')->delete('images/test_img/' . $test->thumbnail);
        }

        $validated['thumbnail'] = $oldPhoto;

        $testUpdate = $test->update($validated);
        return redirect('/admin/mental-test')->with('success', "MentalTest $test->title Updated Successfully!")->withErrors($validated);
    }

    public function destroy($id)
    {
        $test = MentalTest::find($id);
        $test->delete();

        // $psychologistDetail = PsychologistDetail::where('psychologist_id', $id)->first();
        // if ($psychologistDetail) {
        //     $psychologistDetail->delete();
        // }

        return redirect('/admin/mental-test')->with('success', 'Mental Test Deleted Successfully!');
    }

    public function showDeletedTest()
    {
        $deletedTests = MentalTest::onlyTrashed()->paginate(5);
        return view('admin.mental-test-deleted', ['deletedTests' => $deletedTests]);
    }

    public function destroyPermanent($id)
    {
        $deletedTests = MentalTest::onlyTrashed()->first();

        $deletedTests->forceDelete();
        $deletePhoto = Storage::disk('public')->delete('images/test_img/' . $deletedTests->photo);

        return redirect('/admin/deleted-mental-test')->with('success', 'MentalTest Deleted Permanent Successfully!');
    }


    public function restore($id)
    {
        $test = MentalTest::onlyTrashed()->find($id);

        $test->restore();

        return redirect('/admin/mental-test')->with('success', 'MentalTest Restored Successfully!');
    }
}
