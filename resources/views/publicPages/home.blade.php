@extends('Default Layout.default')

@section('title', 'Home - Hospital Management System')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/Styles/home.css') }}">
@endsection

@section('content')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="hero-title">Welcome to HospitalMS</h1>
                    <p class="hero-subtitle">
                        Modern healthcare management made simple. Streamline your hospital operations with our comprehensive
                        digital solution.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ url('/register') }}" class="hero-btn">Get Started</a>
                        <a href="{{ url('/about') }}" class="hero-btn hero-btn-outline">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Why Choose HospitalMS?</h2>
                    <p class="section-subtitle">
                        Our hospital management system provides everything you need to run a modern healthcare facility
                        efficiently.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3 class="feature-title">Patient Management</h3>
                        <p class="feature-description">
                            Easily manage patient records, appointments, and medical history in one secure digital platform.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3 class="feature-title">Appointment Scheduling</h3>
                        <p class="feature-description">
                            Smart scheduling system that helps reduce waiting times and optimizes doctor availability.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Secure & Compliant</h3>
                        <p class="feature-description">
                            HIPAA compliant platform with advanced security features to protect sensitive patient data.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Our Services</h2>
                    <p class="section-subtitle">
                        Comprehensive healthcare management solutions for hospitals of all sizes.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <h4 class="service-title">Medical Records</h4>
                        <p class="service-description">
                            Digital patient records management with easy access and secure storage.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-pills"></i>
                        </div>
                        <h4 class="service-title">Pharmacy Management</h4>
                        <p class="service-description">
                            Track medications, prescriptions, and inventory with automated alerts.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <h4 class="service-title">Lab Reports</h4>
                        <p class="service-description">
                            Manage lab tests, results, and generate comprehensive medical reports.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <h4 class="service-title">Billing System</h4>
                        <p class="service-description">
                            Automated billing and payment processing with insurance integration.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title text-left">About HospitalMS</h2>
                    <div class="about-content">
                        <p>
                            HospitalMS is a modern, comprehensive hospital management system designed to streamline
                            healthcare operations and improve patient care. Our platform combines cutting-edge technology
                            with user-friendly design to create an efficient digital solution for healthcare providers.
                        </p>
                        <p>
                            We understand the challenges faced by healthcare institutions, from managing patient records to
                            coordinating care teams. That's why we've built a system that not only digitizes these processes
                            but makes them more efficient and secure.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row stats-row">
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number">500+</div>
                                <div class="stat-label">Hospitals Trust Us</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number">50K+</div>
                                <div class="stat-label">Patients Managed</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number">99.9%</div>
                                <div class="stat-label">Uptime Guarantee</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number">24/7</div>
                                <div class="stat-label">Support Available</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Contact Us</h2>
                    <p class="section-subtitle">
                        Get in touch with our team for more information about HospitalMS.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h5 class="contact-title">Phone Support</h5>
                        <p class="contact-info">
                            +1 (555) 123-4567<br>
                            Available 24/7
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5 class="contact-title">Email Support</h5>
                        <p class="contact-info">
                            info@hospitalms.com<br>
                            support@hospitalms.com
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5 class="contact-title">Visit Us</h5>
                        <p class="contact-info">
                            123 Medical Street<br>
                            Health City, HC 12345
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="cta-title">Ready to Get Started?</h2>
                    <p class="cta-description">
                        Join hundreds of hospitals already using HospitalMS to improve their operations and patient care.
                    </p>
                    <a href="{{ url('/register') }}" class="cta-btn">Start Your Free Trial</a>
                </div>
            </div>
        </div>
    </section>

@endsection