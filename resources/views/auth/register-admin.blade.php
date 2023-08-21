@extends('layouts.app')
@section('title', 'Register Admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="form-group w-50">
                <form action="/admin/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Role</label>
                        <select class="form-select" name="role">
                            <option value="admin">Admin</option>
                            <option value="psychologist">Psychologist</option>
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
@endsection
