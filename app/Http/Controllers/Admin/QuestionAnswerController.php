<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\MentalTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionAnswerController extends Controller
{
    public function show($id)
    {
        $test = MentalTest::select('id', 'title')->find($id);
        $questions = Question::with(['mentalTest', 'answers'])
            ->where('test_id', $id)->get();
        return view('admin.mental-test-show', compact('test', 'questions'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'test_id' => 'required',
            'content' => 'required',
        ]);

        $question = Question::create($validated);
        return redirect('/admin/show-mental-test/' . $validated['test_id'])->with('success', "Question Added Successfully!")->withErrors($validated);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $question = Question::find($id);
        $testimonialUpdate = $question->update($validated);
        return redirect('/admin/show-mental-test/' . $request['test_id'])->with('success', "Question  Updated Successfully!")->withErrors($validated);
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect('/admin/show-mental-test/' . $question->test_id)->with('success', 'Question Deleted Successfully!');
    }
}
