@extends('layouts.psychologist')
@section('title', 'Dashboard Psychologist')

@section('psychologist_content')

    <div class="my-5">
        <div class="row justify-content-between g-5">

            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('images/icons/consultation-upcoming.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Consultation Upcoming</h5>
                        <p class="card-text text-center">You have consultation {{ $countUpcoming }} upcoming</p>
                        <a href="/admin/psychologist/consultation-upcoming" class="btn btn-primary align-self-center">See
                            Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('images/icons/consultation-completed.png') }}" class="card-img-top" alt="Card-Icon"
                        style="max-height: 150px; width: auto; object-fit: contain;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Consultation Completed</h5>
                        <p class="card-text text-center">You have consultation {{ $countCompleted }} completed</p>
                        <a href="/admin/psychologist/consultation-completed" class="btn btn-primary align-self-center">See
                            Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
