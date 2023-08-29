@extends('layouts.admin')
@section('title', 'Edit Payment Consultation')

@section('admin_content')

    <div class="w-75 mx-auto my-5">
        <h1 class="my-4 text-center">Edit Payment Consultation</h1>
        <form action="/admin/detail-consultation/{{ $payment->consultation_id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="consultation_id" class="form-label">Consultation ID</label>
                <input type="consultation_id" name="consultation_id" id="consultation_id"
                    value="{{ $payment->consultation_id }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-select" id="user_id" name="user_id" readonly>
                    <option value="{{ $payment->user_id }}">{{ $payment->users->name }}
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="psychologist_id" class="form-label">Psychologist</label>
                <select class="form-select" id="psychologist_id" name="psychologist_id" readonly>
                    <option value="{{ $payment->psychologist_id }}">{{ $payment->psychologists->name }}
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Price</label>
                <input type="number" name="total_price" id="total_price" value="{{ $payment->total_price }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="" selected disabled>Select Status</option>
                    <option value="paid" {{ $payment->status === 'paid' ? 'selected' : '' }}>Paid
                    </option>
                    <option value="unpaid" {{ $payment->status === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <a href="/admin/show-consultation{{ $payment->id }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


@endsection
