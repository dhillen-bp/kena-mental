@extends('layouts.admin')
@section('title', 'Edit Testimonial')

@section('admin_content')

    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Edit Data Testimonial</h1>
        <form action="/admin/edit-testimonial/{{ $testimonial->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="" selected disabled>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $testimonial->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="psychologist_id" class="form-label">Psychologist</label>
                <select name="psychologist_id" id="psychologist_id" class="form-control" required>
                    <option value="" selected disabled>Select Psychologist</option>
                    @foreach ($psychologists as $psychologist)
                        <option value="{{ $psychologist->id }}"
                            {{ $psychologist->id == $testimonial->psychologist_id ? 'selected' : '' }}>
                            {{ $psychologist->id }} - {{ $psychologist->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" cols="30" rows="5" class="form-control">{{ $testimonial->content }}</textarea>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/show-testimonial{{ $testimonial->id }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


@endsection
