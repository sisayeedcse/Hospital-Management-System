@extends('defaultLayout.app')

@section('title', 'HospitalX - Leading Healthcare Management System')

@section('content')
    <!-- Hero section with background image -->
    <section class="hero-section">
        <div class="hero-overlay">
            <div class="container">
                <div class="row align-items-center min-vh-75">
                    <div class="col-lg-6">
                        <div class="hero-content text-white">
                            <h1 class="hero-title display-3 font-weight-bold mb-4">
                                Welcome to <span class="text-info">HospitalX</span>
                            </h1>
                            <p class="hero-subtitle lead mb-4">
                                Your health is our priority. Experience world-class healthcare with our modern
                                hospital management system. Quality care, compassionate service, and cutting-edge
                                technology for better health outcomes.
                            </p>
                            <div class="hero-buttons">
                                <a href="#quick-services" class="btn btn-info btn-lg mr-3 shadow">
                                    <i class="fas fa-calendar-check mr-2"></i>Book Appointment
                                </a>
                                <a href="#about" class="btn btn-outline-light btn-lg shadow">
                                    <i class="fas fa-info-circle mr-2"></i>Learn More
                                </a>
                            </div>

                            <!-- Emergency Contact Banner -->
                            <div class="emergency-banner mt-4">
                                <div class="d-flex align-items-center bg-danger text-white p-3 rounded">
                                    <i class="fas fa-phone-alt fa-2x mr-3"></i>
                                    <div>
                                        <strong>Emergency? Call Now!</strong><br>
                                        <span class="h5 mb-0">+1 (234) 567-8911</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick services section -->
    <section class="quick-services py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title text-primary font-weight-bold">
                        <i class="fas fa-hand-holding-medical mr-3"></i>Quick Services
                    </h2>
                    <p class="section-subtitle text-muted">Access our essential services with just a click</p>
                </div>
            </div>

            <div class="row">
                <!-- Book Appointment Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card h-100 text-center p-4 bg-white rounded-lg shadow-sm">
                        <div class="service-icon mb-4">
                            <div
                                class="icon-circle bg-primary text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-calendar-check fa-2x"></i>
                            </div>
                        </div>
                        <h4 class="service-title text-dark mb-3">Book Appointment</h4>
                        <p class="service-description text-muted mb-4">
                            Schedule your consultation with our expert doctors. Choose your preferred time
                            and specialist for personalized healthcare.
                        </p>
                        <a href="/appointments" class="btn btn-primary btn-block">
                            <i class="fas fa-plus mr-2"></i>Book Now
                        </a>
                    </div>
                </div>

                <!-- Find Doctor Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card h-100 text-center p-4 bg-white rounded-lg shadow-sm">
                        <div class="service-icon mb-4">
                            <div
                                class="icon-circle bg-success text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-user-md fa-2x"></i>
                            </div>
                        </div>
                        <h4 class="service-title text-dark mb-3">Find Doctor</h4>
                        <p class="service-description text-muted mb-4">
                            Search and find the right healthcare professional for your needs. Browse by
                            specialty, experience, and availability.
                        </p>
                        <a href="/doctors" class="btn btn-success btn-block">
                            <i class="fas fa-search mr-2"></i>Find Doctor
                        </a>
                    </div>
                </div>

                <!-- View Prescription Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card h-100 text-center p-4 bg-white rounded-lg shadow-sm">
                        <div class="service-icon mb-4">
                            <div
                                class="icon-circle bg-info text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-prescription-bottle-alt fa-2x"></i>
                            </div>
                        </div>
                        <h4 class="service-title text-dark mb-3">View Prescription</h4>
                        <p class="service-description text-muted mb-4">
                            Access your digital prescriptions and medication history. Download, print,
                            or share your prescriptions securely.
                        </p>
                        <a href="/prescriptions" class="btn btn-info btn-block">
                            <i class="fas fa-eye mr-2"></i>View Prescription
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why choose us section -->
    <section class="why-choose-us py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title text-primary font-weight-bold">
                        <i class="fas fa-star mr-3"></i>Why Choose HospitalX?
                    </h2>
                    <p class="section-subtitle text-muted">Committed to excellence in healthcare delivery</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-award text-warning fa-3x"></i>
                        </div>
                        <h5 class="text-dark font-weight-bold">Award Winning</h5>
                        <p class="text-muted">Recognized for excellence in patient care and medical innovation</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-clock text-primary fa-3x"></i>
                        </div>
                        <h5 class="text-dark font-weight-bold">24/7 Emergency</h5>
                        <p class="text-muted">Round-the-clock emergency services with immediate response</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-microscope text-success fa-3x"></i>
                        </div>
                        <h5 class="text-dark font-weight-bold">Advanced Technology</h5>
                        <p class="text-muted">State-of-the-art medical equipment and diagnostic facilities</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-users text-info fa-3x"></i>
                        </div>
                        <h5 class="text-dark font-weight-bold">Expert Team</h5>
                        <p class="text-muted">Highly qualified medical professionals and support staff</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics section -->
    <section class="statistics-section py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h2 class="stat-number" data-target="15000">0</h2>
                        <p class="stat-label">Happy Patients</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fas fa-user-md fa-3x mb-3"></i>
                        <h2 class="stat-number" data-target="75">0</h2>
                        <p class="stat-label">Expert Doctors</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fas fa-hospital fa-3x mb-3"></i>
                        <h2 class="stat-number" data-target="20">0</h2>
                        <p class="stat-label">Departments</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-item">
                        <i class="fas fa-calendar-check fa-3x mb-3"></i>
                        <h2 class="stat-number" data-target="50000">0</h2>
                        <p class="stat-label">Appointments</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action section -->
    <section class="cta-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-white rounded-lg shadow-lg p-5 text-center">
                        <h2 class="cta-title text-primary font-weight-bold mb-4">
                            <i class="fas fa-user-plus mr-3"></i>Join Our Healthcare Community
                        </h2>
                        <p class="cta-subtitle text-muted mb-5 lead">
                            Register today to access our comprehensive healthcare services, manage your appointments,
                            and connect with our medical professionals.
                        </p>

                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-6 mb-3">
                                <div class="registration-card p-4 border border-primary rounded">
                                    <i class="fas fa-user-injured fa-3x text-primary mb-3"></i>
                                    <h4 class="text-primary">Register as Patient</h4>
                                    <p class="text-muted mb-4">
                                        Join thousands of satisfied patients and manage your healthcare journey with us.
                                    </p>
                                    <a href="/register?type=patient" class="btn btn-primary btn-lg btn-block">
                                        <i class="fas fa-user-plus mr-2"></i>Patient Registration
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-6 mb-3">
                                <div class="registration-card p-4 border border-success rounded">
                                    <i class="fas fa-user-md fa-3x text-success mb-3"></i>
                                    <h4 class="text-success">Register as Doctor</h4>
                                    <p class="text-muted mb-4">
                                        Join our medical team and provide exceptional care to patients worldwide.
                                    </p>
                                    <a href="/register?type=doctor" class="btn btn-success btn-lg btn-block">
                                        <i class="fas fa-stethoscope mr-2"></i>Doctor Registration
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="text-muted">
                                Already have an account?
                                <a href="/login" class="text-primary font-weight-bold">Sign in here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials section -->
    <section class="testimonials-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title text-primary font-weight-bold">
                        <i class="fas fa-quote-left mr-3"></i>What Our Patients Say
                    </h2>
                    <p class="section-subtitle text-muted">Real experiences from real patients</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card bg-white p-4 rounded-lg shadow-sm h-100">
                        <div class="testimonial-content">
                            <i class="fas fa-quote-left text-primary fa-2x mb-3"></i>
                            <p class="text-muted mb-4">
                                "Exceptional care and service! The staff is professional, caring, and the facilities
                                are top-notch. I highly recommend HospitalX to anyone seeking quality healthcare."
                            </p>
                            <div class="testimonial-author d-flex align-items-center">
                                <div
                                    class="author-avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mr-3">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-dark">Sarah Johnson</h6>
                                    <small class="text-muted">Patient since 2020</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card bg-white p-4 rounded-lg shadow-sm h-100">
                        <div class="testimonial-content">
                            <i class="fas fa-quote-left text-primary fa-2x mb-3"></i>
                            <p class="text-muted mb-4">
                                "The emergency services saved my life. Quick response, excellent treatment, and
                                compassionate care during my critical time. Forever grateful to the HospitalX team."
                            </p>
                            <div class="testimonial-author d-flex align-items-center">
                                <div
                                    class="author-avatar bg-success text-white rounded-circle d-flex align-items-center justify-content-center mr-3">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-dark">Michael Chen</h6>
                                    <small class="text-muted">Emergency Patient</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card bg-white p-4 rounded-lg shadow-sm h-100">
                        <div class="testimonial-content">
                            <i class="fas fa-quote-left text-primary fa-2x mb-3"></i>
                            <p class="text-muted mb-4">
                                "Modern facilities, experienced doctors, and a management system that makes
                                appointments and prescription management incredibly easy. Highly satisfied!"
                            </p>
                            <div class="testimonial-author d-flex align-items-center">
                                <div
                                    class="author-avatar bg-info text-white rounded-circle d-flex align-items-center justify-content-center mr-3">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-dark">Emily Davis</h6>
                                    <small class="text-muted">Regular Patient</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/Styles/home.css') }}">
@endpush

@push('scripts')
    <script>
        // ========================================
        // HOME PAGE JAVASCRIPT
        // ========================================
        $(document).ready(function () {

            // ========================================
            // COUNTER ANIMATION
            // ========================================
            function animateCounter() {
                $('.stat-number').each(function () {
                    const $this = $(this);
                    const target = parseInt($this.data('target'));

                    $({ countNum: 0 }).animate({
                        countNum: target
                    }, {
                        duration: 2500,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.floor(this.countNum).toLocaleString());
                        },
                        complete: function () {
                            $this.text(target.toLocaleString());
                        }
                    });
                });
            }

            // ========================================
            // INTERSECTION OBSERVER FOR ANIMATIONS
            // ========================================
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (entry.target.classList.contains('statistics-section')) {
                            animateCounter();
                            observer.unobserve(entry.target);
                        }

                        // Add fade-in animation
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe sections for animations
            $('.statistics-section, .service-card, .feature-item, .testimonial-card').each(function () {
                this.style.opacity = '0';
                this.style.transform = 'translateY(30px)';
                this.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                observer.observe(this);
            });

            // ========================================
            // SMOOTH SCROLLING FOR ANCHOR LINKS
            // ========================================
            $('a[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
                    && location.hostname === this.hostname) {
                    let target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 80
                        }, 800);
                        return false;
                    }
                }
            });

            // ========================================
            // HERO PARALLAX EFFECT
            // ========================================
            $(window).scroll(function () {
                const scrolled = $(this).scrollTop();
                const parallax = $('.hero-section');
                const speed = 0.5;

                parallax.css('background-position', 'center ' + (scrolled * speed) + 'px');
            });

            // ========================================
            // SERVICE CARD CLICK TRACKING
            // ========================================
            $('.service-card .btn').click(function (e) {
                const serviceName = $(this).closest('.service-card').find('.service-title').text();
                console.log('Service clicked:', serviceName);

                // Add loading state
                const originalText = $(this).html();
                $(this).html('<i class="fas fa-spinner fa-spin mr-2"></i>Loading...');

                // Remove loading state after redirect (fallback)
                setTimeout(() => {
                    $(this).html(originalText);
                }, 2000);
            });

            // ========================================
            // REGISTRATION BUTTON TRACKING
            // ========================================
            $('.registration-card .btn').click(function (e) {
                const registrationType = $(this).text().includes('Patient') ? 'Patient' : 'Doctor';
                console.log('Registration clicked:', registrationType);

                // Show success message
                if (typeof HospitalX !== 'undefined') {
                    HospitalX.showToast('Redirecting to registration...', 'info');
                }
            });
        });
    </script>
@endpush