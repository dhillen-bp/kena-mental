@extends('layouts.client')
@section('title', 'Payment Consultation')

@section('client_content')

    <div class="card w-50 mx-auto my-5">
        <form action="/payment-consultation" method="POST">
            @csrf
            <div class="card-header bg-purple border-purple">
                <h2 class="text-center">Payment Consultation</h2>
            </div>

            <div class="card-body bg-light">
                <div class="mb-3">
                    <label for="consult" class="form-label">Consultation ID</label>
                    <select class="form-select" id="consult" name="consultation_id" readonly>
                        <option value="{{ $consultation->id }}">{{ $consultation->id }}</option>
                    </select>
                </div>
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
                    <label for="booking_date" class="form-label">Booking Date</label>
                    <input type="datetime-local" class="form-control" id="booking_date"
                        value="{{ $consultation->booking_date }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_price" class="form-label">Total Price</label>
                    <input type="text" class="form-control" id="total_price" name="total_price"
                        value="{{ 200000 }}" readonly>
                </div>
            </div>

            <div class="card-footer bg-light border-purple d-flex justify-content-between">
                <a href="/form-consultation/{{ $psychologist->id }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-purple" id="pay-button">Continue Pay</button>
            </div>
        </form>

    </div>


@endsection
