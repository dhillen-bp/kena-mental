@extends('layouts.admin')
@section('title', 'Edit Data User')

@section('admin_content')

    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Edit User</h1>
        <form action="/admin/edit-user/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label" required>Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" required>Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" required>Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/users" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


@endsection
