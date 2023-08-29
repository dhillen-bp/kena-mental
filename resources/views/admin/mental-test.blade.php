@extends('layouts.admin')
@section('title', 'Mental Test')

@section('admin_content')
    <div class="card-container my-5">
        <h2 class="mb-3 text-center">Mental Test</h2>
        <div class="d-flex justify-content-between my-4">
            <a href="/admin/add-mental-test" class="btn btn-primary">Add Mental Test</a>
            <a href="/admin/deleted-mental-test" class="btn btn-info">Show Deleted Mental Test</a>
        </div>
        <div class="row">
            @foreach ($tests as $test)
                <div class="col-md-4">
                    <div class="card border-primary mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <a href="/admin/edit-mental-test/{{ $test->id }}" class="btn btn-primary">Edit</a>
                            <a href="/admin/show-mental-test/{{ $test->id }}" class="btn btn-info">Detail</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-item-id="{{ $test->id }}">
                                Delete
                            </button>
                        </div>
                        <img src="{{ asset('storage/images/test_img/' . $test->thumbnail) }}" class="card-img-top"
                            alt="Test-Mental" style="height: 250px; object-fit: cover; object-position: bottom;">
                        <div class="card-body">
                            <p class="card-text">{{ $test->desc }}</p>
                        </div>

                        <div class="card-footer bg-primary text-white">
                            <h5 class="text-center">{{ $test->title }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($tests->isNotEmpty())
                @include('partials.modal._modal_delete_mental_test')
            @endif
        </div>
    </div>

@endsection
