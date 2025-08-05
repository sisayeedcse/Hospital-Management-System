@extends('defaultLayout.app')

@section('title', 'About Us - HospitalX Healthcare Excellence')

@section('content')
    <!-- Hero banner section -->
    <section class="about-hero">
        <div class="hero-overlay">
            <div class="container">
                <div class="row align-items-center min-vh-50">
                    <div class="col-lg-8 mx-auto text-center">
                        <h1 class="hero-title display-3 font-weight-bold text-white mb-4">
                            About <span class="text-info">HospitalX</span>
                        </h1>
                        <p class="hero-subtitle lead text-white mb-4">
                            Leading the way in modern healthcare with compassion, innovation, and excellence since 1998.
                            Your trusted healthcare partner for over 25 years.
                        </p>
                        <div class="hero-stats row text-center">
                            <div class="col-md-3 col-6 mb-3">
                                <h3 class="text-info font-weight-bold">25+</h3>
                                <p class="text-white-50">Years of Excellence</p>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <h3 class="text-info font-weight-bold">15K+</h3>
                                <p class="text-white-50">Happy Patients</p>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <h3 class="text-info font-weight-bold">75+</h3>
                                <p class="text-white-50">Expert Doctors</p>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <h3 class="text-info font-weight-bold">20+</h3>
                                <p class="text-white-50">Departments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <!-- Mission and vision section -->
        <section class="mission-vision-section mb-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <div class="mission-card h-100 p-4 bg-white rounded-lg shadow-soft">
                        <div class="card-icon mb-4">
                            <div
                                class="icon-circle bg-primary text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-bullseye fa-2x"></i>
                            </div>
                        </div>
                        <h3 class="text-primary font-weight-bold mb-3">Our Mission</h3>
                        <p class="text-muted mb-4">
                            To provide exceptional healthcare services that improve the quality of life for our patients
                            and their families. We are committed to delivering compassionate, patient-centered care
                            through innovative medical practices and state-of-the-art technology.
                        </p>
                        <ul class="mission-list list-unstyled">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-heart text-danger mr-3"></i>
                                <span>Patient-centered care approach</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-microscope text-success mr-3"></i>
                                <span>Latest medical technology</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-user-md text-info mr-3"></i>
                                <span>Highly qualified medical staff</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-clock text-warning mr-3"></i>
                                <span>24/7 emergency services</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="vision-card h-100 p-4 bg-white rounded-lg shadow-soft">
                        <div class="card-icon mb-4">
                            <div
                                class="icon-circle bg-info text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-eye fa-2x"></i>
                            </div>
                        </div>
                        <h3 class="text-info font-weight-bold mb-3">Our Vision</h3>
                        <p class="text-muted mb-4">
                            To be the leading healthcare provider in the region, recognized for excellence in medical care,
                            research, and education. We envision a healthier community where every individual has access
                            to world-class medical services.
                        </p>
                        <div class="vision-pillars">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="pillar-icon mb-3">
                                        <i class="fas fa-medal text-warning fa-3x"></i>
                                    </div>
                                    <h6 class="text-primary font-weight-bold">Excellence</h6>
                                    <p class="text-muted small">Striving for the highest standards</p>
                                </div>
                                <div class="col-4">
                                    <div class="pillar-icon mb-3">
                                        <i class="fas fa-hands-helping text-success fa-3x"></i>
                                    </div>
                                    <h6 class="text-primary font-weight-bold">Compassion</h6>
                                    <p class="text-muted small">Caring with empathy and kindness</p>
                                </div>
                                <div class="col-4">
                                    <div class="pillar-icon mb-3">
                                        <i class="fas fa-lightbulb text-info fa-3x"></i>
                                    </div>
                                    <h6 class="text-primary font-weight-bold">Innovation</h6>
                                    <p class="text-muted small">Leading medical advancement</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Milestones timeline section -->
        <section class="milestones-section mb-5">
            <div class="text-center mb-5">
                <h2 class="section-title text-primary font-weight-bold">
                    <i class="fas fa-history mr-3"></i>Our Journey & Milestones
                </h2>
                <p class="section-subtitle text-muted">Key achievements that shaped our healthcare excellence</p>
            </div>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-marker bg-primary"></div>
                    <div class="timeline-content">
                        <div class="timeline-card bg-white p-4 rounded-lg shadow-soft">
                            <div class="timeline-header d-flex align-items-center mb-3">
                                <i class="fas fa-hospital text-primary fa-2x mr-3"></i>
                                <div>
                                    <h5 class="text-primary font-weight-bold mb-1">1998 - Hospital Founded</h5>
                                    <p class="text-muted mb-0">HospitalX was established with a vision to provide quality
                                        healthcare</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker bg-success"></div>
                    <div class="timeline-content">
                        <div class="timeline-card bg-white p-4 rounded-lg shadow-soft">
                            <div class="timeline-header d-flex align-items-center mb-3">
                                <i class="fas fa-award text-success fa-2x mr-3"></i>
                                <div>
                                    <h5 class="text-success font-weight-bold mb-1">2005 - First Accreditation</h5>
                                    <p class="text-muted mb-0">Received Joint Commission accreditation for quality and
                                        safety</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker bg-info"></div>
                    <div class="timeline-content">
                        <div class="timeline-card bg-white p-4 rounded-lg shadow-soft">
                            <div class="timeline-header d-flex align-items-center mb-3">
                                <i class="fas fa-heartbeat text-info fa-2x mr-3"></i>
                                <div>
                                    <h5 class="text-info font-weight-bold mb-1">2010 - Cardiac Center Launch</h5>
                                    <p class="text-muted mb-0">Opened state-of-the-art cardiac center with advanced
                                        equipment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker bg-warning"></div>
                    <div class="timeline-content">
                        <div class="timeline-card bg-white p-4 rounded-lg shadow-soft">
                            <div class="timeline-header d-flex align-items-center mb-3">
                                <i class="fas fa-laptop-medical text-warning fa-2x mr-3"></i>
                                <div>
                                    <h5 class="text-warning font-weight-bold mb-1">2018 - Digital Transformation</h5>
                                    <p class="text-muted mb-0">Implemented comprehensive hospital management system</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-marker bg-danger"></div>
                    <div class="timeline-content">
                        <div class="timeline-card bg-white p-4 rounded-lg shadow-soft">
                            <div class="timeline-header d-flex align-items-center mb-3">
                                <i class="fas fa-trophy text-danger fa-2x mr-3"></i>
                                <div>
                                    <h5 class="text-danger font-weight-bold mb-1">2023 - Excellence Award</h5>
                                    <p class="text-muted mb-0">Recognized as "Best Hospital" for outstanding patient care
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core values section -->
        <section class="core-values-section">
            <div class="text-center mb-5">
                <h2 class="section-title text-primary font-weight-bold">
                    <i class="fas fa-gem mr-3"></i>Our Core Values
                </h2>
                <p class="section-subtitle text-muted">The principles that guide everything we do</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="value-card text-center h-100 p-4 bg-white rounded-lg shadow-soft">
                        <div class="value-icon mb-4">
                            <div
                                class="icon-circle-lg bg-primary text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-user-shield fa-3x"></i>
                            </div>
                        </div>
                        <h4 class="text-primary font-weight-bold mb-3">Integrity</h4>
                        <p class="text-muted">
                            We uphold the highest ethical standards in all our interactions, ensuring trust and
                            transparency in every aspect of patient care.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="value-card text-center h-100 p-4 bg-white rounded-lg shadow-soft">
                        <div class="value-icon mb-4">
                            <div
                                class="icon-circle-lg bg-success text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-heart fa-3x"></i>
                            </div>
                        </div>
                        <h4 class="text-success font-weight-bold mb-3">Compassion</h4>
                        <p class="text-muted">
                            Every patient receives care with empathy, kindness, and understanding. We treat each
                            person with dignity and respect.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="value-card text-center h-100 p-4 bg-white rounded-lg shadow-soft">
                        <div class="value-icon mb-4">
                            <div
                                class="icon-circle-lg bg-info text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-graduation-cap fa-3x"></i>
                            </div>
                        </div>
                        <h4 class="text-info font-weight-bold mb-3">Excellence</h4>
                        <p class="text-muted">
                            We continuously strive for the highest quality in medical care, education, and research,
                            never settling for anything less than the best.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="value-card text-center h-100 p-4 bg-white rounded-lg shadow-soft">
                        <div class="value-icon mb-4">
                            <div
                                class="icon-circle-lg bg-warning text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-lightbulb fa-3x"></i>
                            </div>
                        </div>
                        <h4 class="text-warning font-weight-bold mb-3">Innovation</h4>
                        <p class="text-muted">
                            We embrace cutting-edge technology and medical advances to provide the most effective
                            treatments and improve patient outcomes.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="value-card text-center h-100 p-4 bg-white rounded-lg shadow-soft">
                        <div class="value-icon mb-4">
                            <div
                                class="icon-circle-lg bg-danger text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-users fa-3x"></i>
                            </div>
                        </div>
                        <h4 class="text-danger font-weight-bold mb-3">Teamwork</h4>
                        <p class="text-muted">
                            Our multidisciplinary approach ensures collaborative care where every team member
                            contributes to positive patient outcomes.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="value-card text-center h-100 p-4 bg-white rounded-lg shadow-soft">
                        <div class="value-icon mb-4">
                            <div
                                class="icon-circle-lg bg-secondary text-white d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-handshake fa-3x"></i>
                            </div>
                        </div>
                        <h4 class="text-secondary font-weight-bold mb-3">Accountability</h4>
                        <p class="text-muted">
                            We take responsibility for our actions and decisions, ensuring that we deliver on our
                            promises to patients, families, and communities.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/Styles/about.css') }}">
@endpush

@push('scripts')
    <script>
        // ========================================
        // ABOUT PAGE JAVASCRIPT
        // ========================================
        $(document).ready(function () {

            // Timeline animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe timeline items and value cards
            $('.timeline-item, .value-card, .mission-card, .vision-card').each(function () {
                this.style.opacity = '0';
                this.style.transform = 'translateY(30px)';
                this.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                observer.observe(this);
            });

            // Hero stats counter animation
            function animateStats() {
                $('.hero-stats h3').each(function () {
                    const $this = $(this);
                    const target = parseInt($this.text().replace(/[^\d]/g, ''));

                    $({ countNum: 0 }).animate({
                        countNum: target
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            const suffix = $this.text().replace(/[\d,]/g, '');
                            $this.text(Math.floor(this.countNum) + suffix);
                        },
                        complete: function () {
                            const suffix = $this.text().replace(/[\d,]/g, '');
                            $this.text(target + suffix);
                        }
                    });
                });
            }

            // Trigger stats animation when hero is visible
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateStats();
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            const heroStats = document.querySelector('.hero-stats');
            if (heroStats) {
                statsObserver.observe(heroStats);
            }
        });
    </script>
@endpush