@extends('layouts.client')
@section('title', 'Home')

@section('client_content')
    <div class="">
        @include('partials._hero')
        @include('partials._services')
        {{-- @include('partials._psychologists') --}}
        {{-- @include('partials._testimoni') --}}
    </div>
@endsection
