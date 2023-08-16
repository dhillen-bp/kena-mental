@extends('layouts.app')

@section('content')
    <nav class="navbar fixed-top bg-purple navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">kenamental.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('consultations') ? 'active' : '' }}"
                            href="/consultations">Consultation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('mental-test') ? 'active' : '' }}" href="/mental-test">Mental
                            Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('psychologists') ? 'active' : '' }}"
                            href="/psychologists">Psychologists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('testimonials') ? 'active' : '' }}"
                            href="/testimonials">Testimonials</a>
                    </li>
                    @auth()
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <!-- Content here -->
        @yield('client_content')
    </div>

    <footer class="bg-dark text-white">
        <div class="d-flex flex-column container">
            <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap py-3">
                <h2>kenamental.com</h2>
                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="fs-4 ms-3">
                        <i class="bi bi-facebook"></i>
                    </li>
                    <li class="fs-4 ms-3">
                        <i class="bi bi-instagram"></i>
                    </li>
                    <li class="fs-4 ms-3">
                        <i class="bi bi-twitter"></i>
                    </li>
                    <li class="fs-4 ms-3">
                        <i class="bi bi-youtube"></i>
                    </li>
                </ul>
            </div>
            <div class="pt-3 text-center">
                <h4>Counseling with the Best Clinical Psychologists: Professional, Empathizing, and Non-Judgmental</h4>
                <h4>"Talk your heart out, find a way out of your problems."</h4>
            </div>
            <p class="text-secondary mb-3 mt-2 text-center">© 2023 kenamental.com</p>
        </div>
    </footer>
@endsection
