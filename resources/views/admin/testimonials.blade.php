@extends('layouts.admin')
@section('title', 'Data Testimonials')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Data Testimonials</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="/admin/add-testimonial" class="btn btn-primary">Add Testimonial Data</a>
            <a href="/admin/deleted-testimonials" class="btn btn-info">Show Deleted Testimonial</a>
        </div>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Psychologist</th>
                    <th scope="col" class="col-3">Content</th>
                    <th scope="col" class="col-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $testimonial)
                    <tr>
                        <th scope="row">{{ $loop->index + $testimonials->firstItem() }}</th>
                        <td>{{ $testimonial->user->name }}</td>
                        <td>{{ $testimonial->psychologist->name }}</td>
                        <td>{{ $testimonial->content }}</td>
                        <td class="d-flex justify-content-around">
                            <a href="/admin/edit-testimonial/{{ $testimonial->id }}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-item-id="{{ $testimonial->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                @if ($testimonials->isNotEmpty())
                    @include('partials.modal._modal_delete_testimonial')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $testimonials->withQueryString()->links() }}
    </div>

    @include('partials._toastr')
@endsection
