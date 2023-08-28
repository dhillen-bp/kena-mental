@extends('layouts.admin')
@section('title', 'Edit Data Psychologists')

@section('admin_content')
    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Edit Psychologist</h1>
        <form action="/admin/edit-psychologist/{{ $psychologist->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id" class="form-label">ID Psychologist</label>
                <input type="id" name="id" id="id" value="{{ $psychologist->id }}" class="form-control"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" id="name" value="{{ $psychologist->name }}" class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                @if ($psychologist->photo != '')
                    <img src="{{ asset('storage/images/psychologist_photo/' . $psychologist->photo) }}" alt="Cover Image"
                        class="img-fluid d-block mb-3" width="200px">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Test Image" class="img-fluid d-block mb-3"
                        width="200px">
                @endif
                <input class="form-control" type="file" id="photo" name="photo">
            </div>
            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea name="biography" id="" cols="30" rows="5" class="form-control">{{ $psychologist->biography }}</textarea>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/show-psychologist/{{ $psychologist->id }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

    @include('partials._toastr')
@endsection
