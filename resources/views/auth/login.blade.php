@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="form-group w-50">
                <form action="login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                    <div class="mb-3">
                        <a href="/register" class="btn btn-info w-100">Register</a>
                    </div>
                </form>
                <a href="/auth/github/redirect" class="btn btn-dark w-100">Login with Github</a>
            </div>
        </div>
    </div>
    @include('partials._toastr')
@endsection
