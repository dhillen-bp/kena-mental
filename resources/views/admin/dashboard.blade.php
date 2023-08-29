@extends('layouts.admin')
@section('title', 'Dashboard')

@section('admin_content')

    <div class="my-5">
        <div class="row justify-content-between g-5">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/administrator.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Admins</h5>
                        <p class="card-text text-center">We have <b>{{ $userCount }}</b> admins</p>
                        <a href="/admin/show-admin" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/user.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Users</h5>
                        <p class="card-text text-center">We have <b>{{ $userCount }}</b> users</p>
                        <a href="/admin/users" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/psychologist.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Psychologists</h5>
                        <p class="card-text text-center">We have <b>{{ $psychologistCount }}</b> psychologist</p>
                        <a href="/admin/psychologists" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/consultation.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Consultations</h5>
                        <p class="card-text text-center">We have <b>{{ $consultationCount }}</b> consultations</p>
                        <a href="/admin/consultations" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/testimonial.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Testimonials</h5>
                        <p class="card-text text-center">We have <b>{{ $testimonialCount }}</b> testimonials</p>
                        <a href="/admin/testimonials" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/test.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Mental Test</h5>
                        <p class="card-text text-center">We have <b>{{ $testCount }}</b> testimonials</p>
                        <a href="/admin/mental-test" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
