<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta tags and title section -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="HospitalX - Modern Hospital Management System">
    <meta name="keywords" content="hospital, healthcare, medical, management system">
    <meta name="author" content="HospitalX Team">

    <title>@yield('title', 'HospitalX - Hospital Management System')</title>

    <!-- Favicon and icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icons/apple-touch-icon.png') }}">

    <!-- ========================================
         EXTERNAL CSS LIBRARIES
         ======================================== -->
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- ========================================
         CUSTOM CSS STYLES
         ======================================== -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <!-- ========================================
         ADDITIONAL PAGE SPECIFIC STYLES
         ======================================== -->
    @stack('styles')
</head>

<body>
    <!-- ========================================
         MAIN NAVIGATION BAR
         ======================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" id="mainNavbar">
        <div class="container">
            <!-- ========================================
                 BRAND LOGO SECTION
                 ======================================== -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="logo-icon">
                    <i class="fas fa-hospital-alt"></i>
                </div>
                HospitalX
            </a>

            <!-- ========================================
                 MOBILE MENU TOGGLE BUTTON
                 ======================================== -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- ========================================
                 NAVIGATION MENU ITEMS
                 ======================================== -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Home Link -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>

                    <!-- About Link -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>

                    <!-- Services Link -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('services') ? 'active' : '' }}" href="{{ url('/services') }}">
                            <i class="fas fa-stethoscope"></i> Services
                        </a>
                    </li>

                    <!-- Contact Link -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>

                    <!-- ========================================
                         AUTHENTICATION BUTTONS
                         ======================================== -->
                    @guest
                        <!-- Login Button -->
                        <li class="nav-item">
                            <a class="btn btn-login" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>

                        <!-- Register Button -->
                        <li class="nav-item">
                            <a class="btn btn-register" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                    @else
                        <!-- User Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ url('/profile') }}">
                                    <i class="fas fa-user-edit"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- ========================================
         MAIN CONTENT AREA
         ======================================== -->
    <main class="main-content fade-in" style="margin-top: 80px;">
        @yield('content')
    </main>

    <!-- ========================================
         FOOTER SECTION
         ======================================== -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row">
                <!-- ========================================
                     QUICK LINKS COLUMN
                     ======================================== -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5><i class="fas fa-link"></i> Quick Links</h5>
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                            <li><a href="{{ url('/about') }}"><i class="fas fa-info-circle"></i> About Us</a></li>
                            <li><a href="{{ url('/services') }}"><i class="fas fa-stethoscope"></i> Our Services</a>
                            </li>
                            <li><a href="{{ url('/doctors') }}"><i class="fas fa-user-md"></i> Our Doctors</a></li>
                            <li><a href="{{ url('/appointments') }}"><i class="fas fa-calendar-check"></i>
                                    Appointments</a></li>
                            <li><a href="{{ url('/contact') }}"><i class="fas fa-envelope"></i> Contact Us</a></li>
                            <li><a href="{{ url('/privacy-policy') }}"><i class="fas fa-shield-alt"></i> Privacy
                                    Policy</a></li>
                        </ul>
                    </div>
                </div>

                <!-- ========================================
                     CONTACT INFORMATION COLUMN
                     ======================================== -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5><i class="fas fa-map-marker-alt"></i> Contact Info</h5>
                        <ul>
                            <li><a href="#"><i class="fas fa-map-marker-alt"></i> 123 Healthcare Street, Medical City,
                                    MC 12345</a></li>
                            <li><a href="tel:+1234567890"><i class="fas fa-phone"></i> +1 (234) 567-8900</a></li>
                            <li><a href="tel:+1234567891"><i class="fas fa-phone-alt"></i> Emergency: +1 (234)
                                    567-8911</a></li>
                            <li><a href="mailto:info@hospitalx.com"><i class="fas fa-envelope"></i>
                                    info@hospitalx.com</a></li>
                            <li><a href="mailto:emergency@hospitalx.com"><i class="fas fa-envelope-open"></i>
                                    emergency@hospitalx.com</a></li>
                            <li><a href="#"><i class="fas fa-clock"></i> 24/7 Emergency Services</a></li>
                            <li><a href="#"><i class="fas fa-calendar"></i> Mon-Fri: 8:00 AM - 6:00 PM</a></li>
                        </ul>
                    </div>
                </div>

                <!-- ========================================
                     SOCIAL MEDIA & NEWSLETTER COLUMN
                     ======================================== -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="footer-section">
                        <h5><i class="fas fa-share-alt"></i> Connect With Us</h5>
                        <p style="color: #bbb; margin-bottom: 1.5rem;">
                            Stay connected with HospitalX for the latest health tips, news, and updates about our
                            services.
                        </p>

                        <!-- Social Media Icons -->
                        <div class="social-icons">
                            <a href="#" class="social-icon facebook" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon twitter" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon linkedin" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-icon instagram" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>

                        <!-- Newsletter Signup -->
                        <div class="mt-4">
                            <h6 style="color: #fff; margin-bottom: 1rem;">
                                <i class="fas fa-newspaper"></i> Newsletter
                            </h6>
                            <form class="form-inline">
                                <div class="input-group w-100">
                                    <input type="email" class="form-control" placeholder="Your email address"
                                        style="border-radius: 25px 0 0 25px; border: none;">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"
                                            style="border-radius: 0 25px 25px 0; background: var(--primary-color); border: none;">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================
                 FOOTER BOTTOM SECTION
                 ======================================== -->
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p>&copy; {{ date('Y') }} HospitalX. All rights reserved. | Designed with <i
                                class="fas fa-heart" style="color: #e74c3c;"></i> for better healthcare.</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <p>
                            <a href="{{ url('/terms') }}" style="color: #bbb; text-decoration: none;">Terms of
                                Service</a> |
                            <a href="{{ url('/privacy') }}" style="color: #bbb; text-decoration: none;">Privacy
                                Policy</a> |
                            <a href="{{ url('/sitemap') }}" style="color: #bbb; text-decoration: none;">Sitemap</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ========================================
         BACK TO TOP BUTTON
         ======================================== -->
    <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top"
        style="position: fixed; bottom: 20px; right: 20px; display: none; border-radius: 50%; width: 50px; height: 50px; z-index: 1000;">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- ========================================
         JAVASCRIPT LIBRARIES
         ======================================== -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 JS Bundle -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf"
        crossorigin="anonymous"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/app.js') }}"></script>

    <!-- ========================================
         LEGACY JQUERY SUPPORT (FALLBACK)
         ======================================== -->
    <script>
        $(document).ready(function () {
            // ========================================
            // NAVBAR SCROLL BEHAVIOR
            // ========================================
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#mainNavbar').addClass('navbar-scrolled');
                    $('#btn-back-to-top').fadeIn();
                } else {
                    $('#mainNavbar').removeClass('navbar-scrolled');
                    $('#btn-back-to-top').fadeOut();
                }
            });

            // ========================================
            // BACK TO TOP BUTTON FUNCTIONALITY
            // ========================================
            $('#btn-back-to-top').click(function () {
                $('html, body').animate({ scrollTop: 0 }, 600);
                return false;
            });

            // ========================================
            // SMOOTH SCROLLING FOR ANCHOR LINKS
            // ========================================
            $('a[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
                    && location.hostname === this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 80
                        }, 600);
                        return false;
                    }
                }
            });

            // ========================================
            // NAVBAR COLLAPSE ON MOBILE LINK CLICK
            // ========================================
            $('.navbar-nav .nav-link').on('click', function () {
                if ($('.navbar-toggler').is(':visible')) {
                    $('.navbar-collapse').collapse('hide');
                }
            });

            // ========================================
            // FORM VALIDATION STYLING
            // ========================================
            $('form').on('submit', function () {
                $(this).find('.btn[type="submit"]').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
            });

            // ========================================
            // TOOLTIP INITIALIZATION
            // ========================================
            $('[data-toggle="tooltip"]').tooltip();

            // ========================================
            // FADE IN ANIMATION ON SCROLL
            // ========================================
            $(window).scroll(function () {
                $('.fade-in').each(function () {
                    var elementTop = $(this).offset().top;
                    var viewportBottom = $(window).scrollTop() + $(window).height();

                    if (elementTop < viewportBottom - 50) {
                        $(this).addClass('animate__animated animate__fadeInUp');
                    }
                });
            });
        });

        // ========================================
        // PRELOADER (Optional)
        // ========================================
        $(window).on('load', function () {
            $('.preloader').fadeOut();
        });
    </script>

    <!-- ========================================
         ADDITIONAL PAGE SPECIFIC SCRIPTS
         ======================================== -->
    @stack('scripts')
</body>

</html>