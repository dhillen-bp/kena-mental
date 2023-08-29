@extends('layouts.admin')
@section('title', 'Start Test')

@section('admin_content')
    <div class="w-75 mx-auto my-5">
        <h4 class="mb-4">Psychological Tests-{{ $test->title }}</h4>
        <div class="d-flex justify-content-between my-4">
            <a href="/admin/mental-test" class="btn btn-secondary btn-sm">Back</a>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModalQuestion"
                data-item-id="{{ $test->id }}">
                Add Question
            </button>
            <a href="/admin/deleted-question" class="btn btn-info btn-sm">Show Deleted</a>
        </div>

        @foreach ($questions as $question)
            <div class="list-group" style="margin-bottom: -5px; margin-top: 35px">
                <div class="list-group-item list-group-item-action active d-flex justify-content-between"
                    aria-current="true">
                    <label for="question" class="fw-bold">Question:</label>
                    <div>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModalAnswer"
                            data-item-id="{{ $question->id }}">
                            <i class="bi bi-plus-lg"></i>
                        </button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editModalQuestion" data-item-id="{{ $question->id }}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModalQuestion" data-item-id="{{ $question->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                <p class="fw-bold">{{ $loop->index + 1 }}. {{ $question->content }}</p>
            </div>
            @foreach ($question->answers as $answer)
                <div class="list-group mb-1">
                    <div class="list-group-item list-group-item-action d-flex justify-content-between">
                        {{ $answer->choice }}
                        <div>
                            <button type="button" class="btn btn-transparent" data-bs-toggle="modal"
                                data-bs-target="#editModalAnswer" data-item-id="{{ $answer->id }}">
                                <i class="bi bi-pencil-fill text-primary"></i>
                            </button>
                            <button type="button" class="btn btn-transparent" data-bs-toggle="modal"
                                data-bs-target="#deleteModalAnswer" data-item-id="{{ $answer->id }}">
                                <i class="bi bi-trash-fill text-danger"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
        @include('partials.modal._modal_add_question')
        @if ($questions->isNotEmpty())
            @include('partials.modal._modal_add_answer')
            @include('partials.modal._modal_edit_question')
            @include('partials.modal._modal_delete_question')
            @if (!empty($questions->toArray()[0]['answers']))
                @include('partials.modal._modal_edit_answer')
                @include('partials.modal._modal_delete_answer')
            @endif
        @endif
    </div>


@endsection
