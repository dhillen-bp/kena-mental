@extends('layouts.client')
@section('title', 'Home')

@section('client_content')
    <div class="">
        @include('partials._hero')
        @include('partials._services')

    </div>
@endsection
