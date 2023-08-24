@extends('layouts.admin')
@section('title', 'Deleted Testimonials')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Deleted Data Testimonials</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="/admin/testimonials" class="btn btn-primary">Back</a>
        </div>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Psychologist</th>
                    <th scope="col" class="col-3">Content</th>
                    <th scope="col" class="col-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedTestimonials as $testimonial)
                    <tr>
                        <th scope="row">{{ $loop->index + $deletedTestimonials->firstItem() }}</th>
                        <td>{{ $testimonial->user->name }}</td>
                        <td>{{ $testimonial->psychologist->name }}</td>
                        <td>{{ $testimonial->content }}</td>
                        <td>
                            <div class="d-flex justify-content-around justify-items-center">
                                <a href="/admin/restore-testimonial/{{ $testimonial->id }}"
                                    class="btn btn-primary me-2">Restore</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-item-id="{{ $testimonial->id }}">
                                    Delete Permanent
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if ($deletedTestimonials->isNotEmpty())
                    @include('partials.modal._modal_delete_permanent_testimonial')
                @endif
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $deletedTestimonials->links() }}
    </div>

    @include('partials._toastr')
@endsection
