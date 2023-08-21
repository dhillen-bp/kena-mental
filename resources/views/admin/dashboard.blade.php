@extends('layouts.admin')
@section('title', 'Dashboard')

@section('admin_content')

    <div class="my-5">
        <div class="row justify-content-between g-5">

            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/user.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">We have {{ $userCount }} users</p>
                        <a href="#" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/psychologist.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">Psychologists</h5>
                        <p class="card-text">We have {{ $psychologistCount }} psychologist</p>
                        <a href="#" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/consultation.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">Consultations</h5>
                        <p class="card-text">We have {{ $consultationCount }} consultations</p>
                        <a href="#" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/icons/testimonial.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">Testimonials</h5>
                        <p class="card-text">We have {{ $testimonialCount }} testimonials</p>
                        <a href="#" class="btn btn-primary align-self-center">See Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
