@extends('layouts.client')
@section('title', 'Confirm Payment')

@section('client_content')

    <div class="card w-50 mx-auto my-5">

        <div class="card-header bg-purple border-purple">
            <h2 class="text-center">Invoice Payment Consultation</h2>
        </div>

        <div class="card-body bg-light">
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <select class="form-select" id="user" name="user_id" readonly>
                    <option value="{{ $payment->user_id }}">{{ $payment->user_id }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="psychologist" class="form-label">Psychologist</label>
                <select class="form-select" id="psychologist" name="psychologist_id" readonly>
                    <option value="{{ $payment->id }}">{{ $payment->psychologist_id }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price</label>
                <input type="text" class="form-control" id="total_price" name="total_price"
                    value="{{ $payment->total_price }}" readonly>
            </div>
        </div>

        <div class="card-footer bg-light border-purple d-flex justify-content-between">
            <a href="/payment-consultation/{{ $payment->consultation_id }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-purple" id="pay-button">Pay Now</button>
        </div>

    </div>

@endsection
