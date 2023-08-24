@extends('layouts.client')
@section('title', 'Psychologist')

@section('client_content')
    <div class="my-5">
        <h1 class="mb-3">Our Psychologist</h1>
        <div class="row">
            @foreach ($psychologists as $psychologist)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/images/psychologist_photo/' . $psychologist->photo) }}"
                            class="card-img-top" alt="Psychologist-Photo">
                        <div class="card-body">
                            <h3 class="card-title text-center">{{ $psychologist->name }}</h3>
                            <h5>Biography</h5>
                            <p class="card-text">Beliau ini adalah beliau. Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. In, atque?</p>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="psychologist/{{ $psychologist->id }}" class="btn btn-purple">See Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="my-5">
            {{ $psychologists->links() }}
        </div>

    </div>
@endsection
