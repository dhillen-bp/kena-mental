@extends('layouts.app')
@section('title', 'Register Admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="form-group w-50">
                <form action="/admin/register" method="POST">
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
                            <option value="admin">Admin</option>
                            <option value="psychologist">Psychologist</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="psychologist_id" class="form-label">Psychologist</label>
                        <select name="psychologist_id" id="psychologist_id" class="form-control">
                            <option value="" selected disabled>Select Psychologist</option>
                            @foreach ($psychologists as $psychologist)
                                <option value="{{ $psychologist->id }}">{{ $psychologist->id }} - {{ $psychologist->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </div>
                    <div class="mb-3">
                        <a href="/admin/login" class="btn btn-light w-100">Back to Login</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @include('partials._scriptHideFormAdmin')
    @include('partials._toastr')
@endsection
