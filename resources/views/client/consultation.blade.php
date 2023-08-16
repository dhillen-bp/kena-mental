@extends('layouts.client')
@section('title', 'Consultation')

@section('client_content')
    <div class="row my-5">
        @if (!empty($message))
            <h2 class="text-center">{{ $message }}</h2>
        @endif
        @foreach ($consultation as $consult)
            <div class="col">
                <div class="card border-purple mb-3" style="max-width: 18rem;">
                    <div class="card-header border-purple d-flex flex-column align-items-center bg-transparent">
                        <h5 class="card-title">Consultation</h5>
                        <small class="text-sm">{{ $consult->booking_date }}</small>
                    </div>
                    <div class="card-body text-purple">
                        <h5 class="card-title">Consultation {{ $message }}</h5>

                        <p class="card-text">{{ $consult->notes }}</p>
                    </div>
                    <div class="card-footer border-purple d-flex justify-content-center bg-transparent">
                        <a href="/consultation-detail/{{ $consult->id }}" class="btn btn-purple">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
