@extends('layouts.client')
@section('title', 'Mental Test')

@section('client_content')
    <div class="card-container my-5">
        <h2 class="mb-3 text-center">Test Mental / Psychological</h2>
        <div class="row">

            @foreach ($tests as $test)
                <div class="col-md-4">
                    <div class="card border-purple mb-4">
                        <div class="card-header">
                            <h5 class="text-center">{{ $test->title }}</h5>
                        </div>
                        <img src="{{ asset('storage/images/test_img/' . $test->thumbnail) }}" class="card-img-top"
                            alt="Test-Mental" style="height: 250px; object-fit: cover; object-position: bottom;">
                        <div class="card-body">
                            <p class="card-text">{{ $test->desc }}</p>
                        </div>

                        <div class="card-footer d-flex justify-content-center">
                            <a href="/mental-test/{{ $test->id }}" class="btn btn-purple">Try Test</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
