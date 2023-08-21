@extends('layouts.admin')
@section('title', 'Data Testimonials')

@section('admin_content')
    <div class="container my-5">
        <h1 class="mb-4">Data Testimonials</h1>
        <table class="table-striped table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Psychologist</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $testimonial)
                    <tr>
                        <th scope="row">{{ $loop->index + $testimonials->firstItem() }}</th>
                        <td>{{ $testimonial->user->name }}</td>
                        <td>{{ $testimonial->psychologist->name }}</td>
                        <td>{{ $testimonial->content }}</td>
                        <td>
                            <a href="/admin/testimonial-detail/{{ $testimonial->id }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $testimonials->withQueryString()->links() }}
    </div>

@endsection
