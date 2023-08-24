@extends('layouts.admin')
@section('title', 'Add Data Psychologists')

@section('admin_content')
    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Add Psychologist</h1>
        <form action="/admin/add-psychologist" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID Psychologist</label>
                <input type="id" name="id" id="id" value="{{ $psychologist_id }}" class="form-control"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input class="form-control" type="file" id="photo" name="photo">
            </div>
            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea name="biography" id="" cols="30" rows="5" class="form-control">{{ old('biography') }}</textarea>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/psychologists" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

    @include('partials._toastr')
@endsection
