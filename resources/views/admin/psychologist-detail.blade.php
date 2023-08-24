@extends('layouts.admin')
@section('title', 'Edit Detail Psychologists')

@section('admin_content')
    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Edit Detail Psychologist</h1>
        <form action="/admin/detail-psychologist/{{ $psychologist->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id" class="form-label">ID Psychologist</label>
                <input type="id" name="id" id="id" value="{{ $psychologist->id }}" class="form-control"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="university" class="form-label">University</label>
                <input type="university" name="university" id="university"
                    value="{{ optional($psychologist->psychologistDetail)->university }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year Graduated</label>
                <input type="year" name="year" id="year"
                    value="{{ optional($psychologist->psychologistDetail)->year }}" class="form-control" pattern="\d{4}">
            </div>
            <div class="mb-3">
                <label for="degree" class="form-label">Degree</label>
                <input type="degree" name="degree" id="degree"
                    value="{{ optional($psychologist->psychologistDetail)->degree }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="topics" class="form-label">Topics</label>
                <input type="topics" name="topics" id="topics"
                    value="{{ optional($psychologist->psychologistDetail)->topics }}" class="form-control">
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/show-psychologist/{{ $psychologist->id }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

    @include('partials._toastr')
@endsection
