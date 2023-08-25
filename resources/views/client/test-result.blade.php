@extends('layouts.client')
@section('title', 'Test Result')

@section('client_content')


    <div class="card mx-auto my-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-8 bg-light">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $totalScore }}</h5>

                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="/psychologists" class="btn btn-secondary">Back</a>
                <a href="" class="btn btn-purple">Consult Now</a>
            </div>
        </div>
    </div>

@endsection
