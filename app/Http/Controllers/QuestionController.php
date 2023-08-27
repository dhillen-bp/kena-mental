<?php

namespace App\Http\Controllers;

use App\Helpers\ResultTestHelper;
use App\Models\Answer;
use App\Models\Question;
use App\Models\MentalTest;
use App\Models\ResultTest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show($id)
    {
        $test = MentalTest::select('id', 'title')->find($id);
        $questions = Question::with(['mentalTest', 'answers'])
            ->where('test_id', $id)->get();
        return view('client.test-start', compact('test', 'questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'test_id' => 'required',
            'question_id.*' => 'required',
            'answer_id.*' => 'required',
        ]);

        $testResults = [];

        foreach ($validated['question_id'] as $index => $questionId) {
            $testResults[] = [
                'id' => Str::uuid(),
                'user_id' => $validated['user_id'],
                'test_id' => $validated['test_id'],
                'question_id' => $questionId,
                'answer_id' => $validated['answer_id'][$index],
                'test_completed_at' => now(),
            ];
        }
        // return var_dump($testResults);
        ResultTest::insert($testResults);

        return redirect()->route('mental-test.result', [
            'user_id' => $validated['user_id'],
            'completed_at' => now(),
        ])->with('success', "Completed Test Successfully!");
    }

    public function result($user_id, $completed_at)
    {

        $testResults = ResultTest::with('answer:id,score')->where('user_id', $user_id)
            ->where('test_completed_at', $completed_at)
            ->get();
        $testId = $testResults->first()->test_id;
        $testName = MentalTest::find($testId)->title;

        // Mengambil id jawaban yang dipilih dari tabel result_tests
        $answerIds = $testResults->pluck('answer_id')->toArray();

        // mengambil score dari jawaban
        $answerScores = $testResults->map(function ($result) {
            return $result->answer->score;
        })->toArray();

        // Menghitung total skor berdasarkan id jawaban dari tabel test_answers
        $totalScore = Answer
            ::whereIn('id', $answerIds)
            ->sum('score');

        $result = [];
        if ($testId === 'TS001') {
            $result = ResultTestHelper::testStress($totalScore, $answerIds);
        } elseif ($testId === 'TS002') {
            $result = ResultTestHelper::testLoneliness($totalScore, $answerIds);
        } elseif ($testId === 'TS003') {
            $result = ResultTestHelper::testLoveLanguage($answerScores, $totalScore, $answerIds);
        }

        return view('client.test-result', compact('result', 'testName'));
    }

    public function test()
    {
        return view('client.test-result');
    }
}
