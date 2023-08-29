@extends('layouts.client')
@section('title', 'Form Consultation')

@section('client_content')
    <div class="card bg-purple w-50 mx-auto my-5">
        <form action="/form-consultation" method="POST">
            @csrf
            <div class="card-header bg-light border-purple text-purple">
                <h2 class="text-center">Form Consultation</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <select class="form-select" id="user" name="user_id" readonly>
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="psychologist" class="form-label">Psychologist</label>
                    <select class="form-select" id="psychologist" name="psychologist_id" readonly>
                        <option value="{{ $psychologist->id }}">{{ $psychologist->name }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Booking Date</label>
                    <input type="datetime-local" class="form-control" id="booking_date" name="booking_date">
                </div>
            </div>

            <div class="card-footer bg-light border-purple d-flex justify-content-between">
                <a href="/psychologist/{{ $psychologist->id }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-purple">Book Now</button>
            </div>
        </form>
    </div>

@endsection
