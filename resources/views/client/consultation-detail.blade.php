@extends('layouts.client')

@section('client_content')
    <div class="col w-75 mx-auto mt-5">
        <div class="card border-purple mb-3">
            <div class="card-header border-purple d-flex flex-column align-items-center bg-transparent">
                <h5 class="card-title">Consultation</h5>
                <small class="text-sm">{{ $consultation->booking_date }}</small>
            </div>
            <div class="card-body text-purple">
                <p class="card-text">{{ $consultation->notes }}</p>
            </div>
            <div class="card-footer border-purple d-flex justify-content-between bg-transparent">
                <a href="/consultation" class="btn btn-secondary">Back</a>
                <a href="/export-pdf/" class="btn btn-purple">Export to PDF</a>
            </div>
        </div>
    </div>
@endsection
