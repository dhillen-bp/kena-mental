@extends('layouts.admin')
@section('title', 'Add Mental Test')

@section('admin_content')
    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Add Mental Test</h1>
        <form action="/admin/add-mental-test" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID Test</label>
                <input type="id" name="id" id="id" value="{{ $test_id }}" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="title" name="title" id="title" class="form-control" value="{{ old('title') }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input class="form-control" type="file" id="thumbnail" name="thumbnail">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea name="desc" id="" cols="30" rows="5" class="form-control">{{ old('desc') }}</textarea>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/mental-test" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>


@endsection
