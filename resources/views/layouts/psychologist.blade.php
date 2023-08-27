@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Psychologist KenaMental</a>
            <div>
                <span class="me-3">{{ auth('admin')->user()->name }}</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/psychologist') ? 'active' : '' }}"
                                    href="/admin/psychologist">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/psychologist/consultation-upcoming') ? 'active' : '' }}"
                                    href="/admin/psychologist/consultation-upcoming">Upcoming Consultations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/psychologist/consultation-completed') ? 'active' : '' }}"
                                    href="/admin/psychologist/consultation-completed">Completed Consultations</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Account
                                </a>
                                <ul class="dropdown-menu">
                                    @auth('admin')
                                        <li class="nav-item">
                                            <a class="dropdown-item {{ Request::is('profile') ? 'active' : '' }}"
                                                href="/admin/psychologist/profile">Profile</a>
                                        </li>
                                        <hr class="dropdown-divider">
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="/admin/psychologist/logout">Logout</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="{{ '/admin/psychologist/login' }}">Login</a>
                                        </li>
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5" style="min-height: 100vh;">
        <!-- Content here -->
        @yield('psychologist_content')
    </div>

    <footer class="bg-primary text-white">
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
                <h4>Admin-kenamental.com</h4>
            </div>
            <p class="text-light mb-3 mt-2 text-center">© 2023 kenamental.com</p>
        </div>
    </footer>
@endsection
