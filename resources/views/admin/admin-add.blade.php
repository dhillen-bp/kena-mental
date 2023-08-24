@extends('layouts.admin')
@section('title', 'Add Data Admin')

@section('admin_content')

    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Add Admin</h1>
        <form action="/admin/add-admin" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label" required>Name</label>
                <input type="name" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" required>Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" required>Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-4">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" name="role" id="role" required>
                    <option value="" selected disabled>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="psychologist">Psychologist
                    </option>
                </select>
            </div>
            <div class="mb-3" id="psychologistField">
                <label for="psychologist_id" class="form-label">Psychologist</label>
                <select name="psychologist_id" id="psychologist_id" class="form-control">
                    <option value="" selected disabled>Select Psychologist</option>
                    @foreach ($psychologists as $psychologist)
                        <option value="{{ $psychologist->id }}">{{ $psychologist->id }} - {{ $psychologist->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/show-admin" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Store</button>
            </div>
        </form>
    </div>

    @include('partials._scriptHideFormAdmin')
    @include('partials._toastr')
@endsection
