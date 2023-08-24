@extends('layouts.admin')
@section('title', 'Add Data User')

@section('admin_content')

    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Add User</h1>
        <form action="/admin/add-user" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label" required>Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" required>Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" required>Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/show-admin" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Store</button>
            </div>
        </form>
    </div>

    @include('partials._toastr')
@endsection
