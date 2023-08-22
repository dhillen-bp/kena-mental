@extends('layouts.admin')
@section('title', 'Add Data Psychologists')

@section('admin_content')
    <h1 class="my-5 text-center">Detail Psychologist</h1>
    <div class="d-flex justify-content-center">
        <a href="/admin/edit-psychologist/{{ $psychologist->id }}" class="btn btn-primary">Edit Psychologist</a>
    </div>

    <div class="card mx-auto my-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4 bg-purple">
                @if ($psychologist->photo != '')
                    <img src="{{ asset('storage/images/psychologist_photo/' . $psychologist->photo) }}"
                        style="width: 200px; height: 100%; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Photo" width="200px">
                @endif
            </div>
            <div class="col-md-8 bg-light">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $psychologist->name }}</h5>
                    <p class="card-text">{{ $psychologist->biography }}.</p>
                    <p class="card-text">{{ optional($psychologist->psychologistDetail)->university }} <small
                            class="card-text text-body-secondary d-block text-sm">{{ optional($psychologist->psychologistDetail)->degree }}
                            -
                            {{ optional($psychologist->psychologistDetail)->year }}</small></p>

                    <p class="card-text">Topics: {{ optional($psychologist->psychologistDetail)->topics }}</p>
                    <h6>Consult Session: <span class="badge bg-purple"><i class="bi bi-person-hearts"></i>
                            {{ optional($psychologist->psychologistDetail)->session_count }}</span></h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="/admin/psychologists" class="btn btn-secondary">Back</a>
                <a href="/admin/detail-psychologist/{{ $psychologist->id }}" class="btn btn-primary">Edi Detail</a>
            </div>
        </div>
    </div>

    @include('partials.toastr')
@endsection
