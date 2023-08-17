@extends('layouts.client')
@section('title', 'Mental Test')

@section('client_content')
    <div class="card-container my-5">
        <h2 class="mb-3 text-center">Testimonials</h2>
        <div class="row">
            @foreach ($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="card border-purple mb-4">
                        <div class="card-body">
                            <a href="psychologist/{{ $testimonial->psychologist_id }}">To:
                                {{ $testimonial->psychologist->name }}</a>
                            <hr>
                            <p class="card-text">{{ $testimonial->content }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-center bg-purple">
                            By: {{ $testimonial->user->name }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
