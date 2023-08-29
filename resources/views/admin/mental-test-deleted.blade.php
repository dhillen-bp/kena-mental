@extends('layouts.admin')
@section('title', 'Deleted Mental Test')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Deleted Mental Test</h1>
        <div class="d-flex justify-content-between">
            <a href="/admin/mental-test" class="btn btn-primary">Back</a>

        </div>
        <table class="table-striped table">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="col-1">ID</th>
                    <th scope="col" class="col-2">Thumb</th>
                    <th scope="col" class="col-2">Title</th>
                    <th scope="col" class="col-3">Desc</th>
                    <th scope="col" class="col-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedTests as $test)
                    <tr class="text-center">
                        <th scope="row">{{ $test->id }}</th>
                        <td>
                            <img src="{{ asset('storage/images/test_img/' . $test->thumbnail) }}" class="img-fluid"
                                style="max-width: 100%; height: auto;" alt="Test-Mental">
                            <div class="card-body">
                        </td>
                        <td>{{ $test->title }}</td>
                        <td>{{ $test->desc }}</td>
                        <td>
                            <div class="d-flex justify-content-around justify-items-center">
                                <a href="/admin/restore-mental-test/{{ $test->id }}"
                                    class="btn btn-primary me-2">Restore</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-item-id="{{ $test->id }}">
                                    Delete Permanent
                                </button>
                            </div>

                        </td>
                    </tr>
                @endforeach
                @if ($deletedTests->isNotEmpty())
                    @include('partials.modal._modal_delete_permanent_mental_test')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $deletedTests->withQueryString()->links() }}
    </div>




@endsection
