@extends('layouts.admin')
@section('title', 'Add Data Testimonial')

@section('admin_content')
    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Add Testimonial</h1>
        <form action="/admin/add-testimonial" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="" selected disabled>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="psychologist_id" class="form-label">Psychologist</label>
                <select name="psychologist_id" id="psychologist_id" class="form-control" required>
                    <option value="" selected disabled>Select Psychologist</option>
                    @foreach ($psychologists as $psychologist)
                        <option value="{{ $psychologist->id }}">{{ $psychologist->id }} - {{ $psychologist->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="" cols="30" rows="5" class="form-control">{{ old('content') }}</textarea>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/testimonials" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>


@endsection
