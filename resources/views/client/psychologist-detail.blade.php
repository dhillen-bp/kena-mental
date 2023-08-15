@extends('layouts.client')

@section('client_content')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

    <div class="card mx-auto my-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4 bg-purple">
                @if ($psychologist->photo != '')
                    <img src="{{ asset('images/psychologist-photo/' . $psychologist->photo) }}"
                        style="width: 200px; height: 100%; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default.jpg') }}" alt="Photo" width="200px">
                @endif
            </div>
            <div class="col-md-8 bg-light">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $psychologist->name }}</h5>
                    <p class="card-text">{{ $psychologist->biography }}.</p>
                    <p class="card-text">{{ $psychologist->psychologistDetail->university }} <small
                            class="card-text text-body-secondary d-block text-sm">{{ $psychologist->psychologistDetail->degree }}
                            -
                            {{ $psychologist->psychologistDetail->year }}</small></p>

                    <p class="card-text">Topics: {{ $psychologist->psychologistDetail->topics }}</p>
                    <h6>Consult Session: <span class="badge bg-purple"><i class="bi bi-person-hearts"></i>
                            {{ $psychologist->psychologistDetail->session_count }}</span></h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="/psychologists" class="btn btn-secondary">Back</a>
                <a href="/psychologist/" class="btn btn-purple">Consult Now</a>
            </div>
        </div>
    </div>
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    @foreach ($psychologist->consultations as $consultation)
                        {
                            title: 'Consultation',
                            start: '{{ $consultation->booking_date }}',
                            end: '{{ $consultation->booking_date }}',
                        },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>
@endsection
