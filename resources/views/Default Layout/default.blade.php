<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Hospital Management System')</title>

    <!-- Bootstrap 4 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/Styles/defaultlayout.css') }}">

    @yield('additional-css')
</head>

<body>

    <!-- Header Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <!-- Our Brand -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-hospital-alt"></i> HospitalMS
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Navigation Links -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/services') }}">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                        </li>
                    </ul>

                    <!-- Auth Buttons -->
                    <div class="navbar-nav ml-auto">
                        <a href="{{ url('/login') }}" class="btn btn-login">Login</a>
                        <a href="{{ url('/register') }}" class="btn btn-register">Register</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row">
                <!-- Brand and About -->
                <div class="col-md-4">
                    <h5 class="footer-brand">HospitalMS</h5>
                    <p class="footer-description">
                        A comprehensive healthcare management system designed to streamline hospital operations
                        and improve patient care with modern technology solutions.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4">
                    <h6 class="mb-3">Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="{{ url('/about') }}"><i class="fas fa-info-circle"></i> About Us</a></li>
                        <li><a href="{{ url('/services') }}"><i class="fas fa-stethoscope"></i> Services</a></li>
                        <li><a href="{{ url('/contact') }}"><i class="fas fa-phone"></i> Contact</a></li>
                        <li><a href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-md-4">
                    <h6 class="mb-3">Contact Info</h6>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Medical Street, Health City</li>
                        <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-envelope"></i> info@hospitalms.com</li>
                        <li><i class="fas fa-clock"></i> 24/7 Emergency Services</li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} HospitalMS. All Rights Reserved. | Designed with <i
                        class="fas fa-heart text-danger"></i> for Healthcare</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield('additional-js')
</body>

</html>