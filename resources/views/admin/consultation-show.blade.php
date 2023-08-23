@extends('layouts.admin')
@section('title', 'Detail Consultation')

@section('admin_content')
    <div class="w-75 mx-auto my-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Detail Consultation</h4>
                <a href="/admin/edit-consultation/{{ $consultation->id }}" class="btn btn-primary btn-sm">Edit
                    Consultation</a>
            </div>
            <div class="card-body">
                <h6 class="">Consultation ID : {{ $consultation->id }}</h6>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary">User ID: {{ $consultation->user_id }}</li>
                    <li class="list-group-item">User Name: {{ $consultation->users->name }}</li>
                    <li class="list-group-item list-group-item-primary">User ID: {{ $consultation->psychologist_id }}</li>
                    <li class="list-group-item">User Name: {{ $consultation->psychologists->name }}</li>
                    <li class="list-group-item list-group-item-primary">Booking Date:
                        {{ $consultation->booking_date }}</li>
                    <li class="list-group-item list-group-item-primary">Notes:
                        {{ $consultation->notes }}</li>
                    <li class="list-group-item">Price: {{ $formattedAmount }}</li>
                    <li class="list-group-item">Status Payment: {{ $consultation->paymentConsultation->status }}</li>
                </ul>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="/admin/consultations" class="btn btn-secondary">Back</a>
                <a href="/admin/detail-consultation/{{ $consultation->id }}" class="btn btn-primary">Edit Payment
                    Consultation</a>
            </div>
        </div>
    </div>

    @include('partials.toastr')
@endsection
