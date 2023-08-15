@extends('layouts.client')

@section('client_content')
    <div class="card bg-purple my-5 w-full">
        <div class="card-header">
            <h4>Online Consulting</h4>
            <small class="me-2"><i class="bi bi-clock-fill"></i> 60 minutes</small>
            <small><i class="bi bi-camera-video-fill"> Via Video Call</i></small>
        </div>
        <div class="card-body bg-light text-dark">
            <div class="card-text">
                <span>Online counseling via video call</span>
                <span class="d-block">1-on-1 with a psychologist</span>
            </div>
            <hr>
            <div class="card-text">
                <ul class="list-group">
                    <li class="list-group-item">General Mental Health Test</li>
                    <li class="list-group-item">Personality Test</li>
                    <li class="list-group-item">Career Interest Test</li>
                    <li class="list-group-item">PDF Interpretation of Test Results</li>
                    <li class="list-group-item">Worksheet</li>
                    <li class="list-group-item">Pre-Counseling Assessment</li>
                    <li class="list-group-item">Personalized Worksheet*</li>
                </ul>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <h5>Rp. 200.000</h5>
            <a href="" class="btn btn-primary">Choose Now</a>
        </div>
    </div>

    <div class="card bg-purple my-5 w-full">
        <div class="card-header">
            <h4>Offline Consulting</h4>
            <small class="me-2"><i class="bi bi-clock-fill"></i> 60 minutes</small>
            <small><i class="bi bi-camera-video-fill"> Via Video Call</i></small>
        </div>
        <div class="card-body bg-light text-dark">
            <div class="card-text">
                <span>Offline counseling via video call</span>
                <span class="d-block">1-on-1 with a psychologist</span>
            </div>
            <hr>
            <div class="card-text">
                <ul class="list-group">
                    <li class="list-group-item">General Mental Health Test</li>
                    <li class="list-group-item">Personality Test</li>
                    <li class="list-group-item">Career Interest Test</li>
                    <li class="list-group-item">PDF Interpretation of Test Results</li>
                    <li class="list-group-item">Worksheet</li>
                    <li class="list-group-item">Pre-Counseling Assessment</li>
                    <li class="list-group-item">Personalized Worksheet*</li>
                </ul>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <h5>Rp. 220.000</h5>
            <form action="{{ route('choose-package') }}" method="POST">
                @csrf
                <input type="hidden" name="package_price" value="220000">
                <input type="hidden" name="session_type" value="offline">
                <button type="submit" class="btn btn-primary">Choose Now</button>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    // Dummy event data
                    {
                        title: 'Event 1',
                        start: '2023-08-01',
                        end: '2023-08-02'
                    },
                    {
                        title: 'Event 2',
                        start: '2023-08-05',
                        end: '2023-08-07'
                    }
                    // ... add more events here
                ]
            });
            calendar.render();
        });
    </script>
@endpush
