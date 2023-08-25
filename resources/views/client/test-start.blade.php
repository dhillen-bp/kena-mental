@extends('layouts.client')
@section('title', 'Start Test')

@section('client_content')
    <div class="w-75 mx-auto my-5">
        <h4 class="mb-4">Psychological Tests-{{ $test->title }}</h4>
        <form action="/mental-test/result" method="post">
            @csrf
            <input type="hidden" name="id">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="test_id" value="{{ $test->id }}">

            @foreach ($questions as $question)
                <input type="hidden" name="question_id[]" value="{{ $question->id }}">
                <div class="form-group my-3">
                    <label for="question" class="fw-bold">Question:</label>
                    <p>{{ $loop->index + 1 }}. {{ $question->content }}</p>
                </div>
                @foreach ($question->answers as $answer)
                    <div class="form-check mb-2">
                        <input type="radio" class="form-check-input" id="answer_{{ $answer->id }}"
                            name="answer_id[{{ $loop->parent->index }}]" value="{{ $answer->id }}">
                        <label class="form-check-label" for="answer_{{ $answer->id }}">{{ $answer->choice }}</label>
                    </div>
                @endforeach
            @endforeach

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

    </div>
@endsection
