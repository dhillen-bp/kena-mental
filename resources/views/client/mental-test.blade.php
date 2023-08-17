@extends('layouts.client')
@section('title', 'Mental Test')

@section('client_content')
    <div class="card-container my-5">
        <h2 class="mb-3 text-center">Test Mental / Psychological</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card border-purple mb-4">
                    <div class="card-header">
                        <h5 class="text-center">Stress Severity Tests</h5>
                    </div>
                    <img src="{{ asset('images/stress_test.png') }}" class="card-img-top" alt="Test-Mental"
                        style="height: 250px; object-fit: cover; object-position: bottom;">
                    <div class="card-body">
                        <p class="card-text">This test can measure your stress levels. The results of this test will help
                            you
                            know
                            the current state of your mental health.</p>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="test-love" class="btn btn-purple">Try Test</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-purple mb-4">
                    <div class="card-header">
                        <h5 class="text-center">Lonely Severity Tests</h5>
                    </div>
                    <img src="{{ asset('images/lonely_test.png') }}" class="card-img-top" alt="Test-Mental"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="card-text">High levels of loneliness can have a negative impact on mental health. Check
                            your loneliness levels to reduce this risk.</p>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="test-love" class="btn btn-purple">Try Test</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-purple mb-4">
                    <div class="card-header">
                        <h5 class="text-center">Love Language Test</h5>
                    </div>
                    <img src="{{ asset('images/love_test.png') }}" class="card-img-top" alt="Test-Mental"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="card-text">Want to know how you and he want to be loved? Try this love language test for
                            better understanding!</p>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="test-love" class="btn btn-purple">Try Test</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
