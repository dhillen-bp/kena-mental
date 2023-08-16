@extends('layouts.client')
@section('title', 'Profile')

@section('client_content')
    <div class="w-50 mx-auto my-5">
        <div>
            <div class="mb-3">
                <h5>Profile</h5>
                <label for="email" class="form-label">Email address</label>
                <input type="email" value="{{ Auth::user()->email }}" class="form-control" id="email"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{ Auth::user()->name }}" class="form-control" id="name"
                    aria-describedby="emailHelp">
            </div>
        </div>

        <form class="my-5">
            <h5>Update Password</h5>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
