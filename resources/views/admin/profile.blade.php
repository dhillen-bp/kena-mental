@extends('layouts.admin')
@section('title', 'Profile')

@section('admin_content')

    <div class="w-50 mx-auto my-5">
        <h1 class="my-4 text-center">Profile</h1>
        <form action="/admin/profile" method="POST">
            @csrf
            @method('PUT')
            @if ($profileData['psychologist_id'])
                <div class="mb-3">
                    <label for="psychologist_id" class="form-label" required>Psychologist ID</label>
                    <input type="text" name="psychologist_id" id="psychologist_id"
                        value="{{ $profileData['psychologist_id'] }}" class="form-control" readonly>
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label" required>Name</label>
                <input type="text" name="name" id="name" value="{{ $profileData['name'] }}" class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" required>Email</label>
                <input type="email" name="email" id="email" value="{{ $profileData['email'] }}" class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" required>Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>


@endsection
