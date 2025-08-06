@extends('Default Layout.default')

@section('title', 'About Us - Hospital Management System')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/Styles/about.css') }}">
@endsection

@section('content')

    <!-- Page Header -->
    <section class="about-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="about-title">About HospitalMS</h1>
                    <p class="about-subtitle">Revolutionizing healthcare management with modern technology and compassionate
                        care</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section class="mission-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Our Mission</h2>
                    <p class="section-subtitle">We are committed to transforming healthcare through innovative technology
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="mission-title">Mission</h3>
                        <p class="mission-text">
                            To provide comprehensive, user-friendly hospital management solutions that enhance patient care,
                            streamline operations, and improve healthcare outcomes worldwide.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="mission-title">Vision</h3>
                        <p class="mission-text">
                            To be the leading healthcare technology provider, empowering hospitals and medical facilities
                            to deliver exceptional patient care through digital innovation.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="mission-title">Values</h3>
                        <p class="mission-text">
                            Patient-first approach, innovation, integrity, security, and continuous improvement in
                            everything we do to serve the healthcare community better.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="story-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Our Story</h2>
                    <p class="section-subtitle">Founded with a vision to modernize healthcare management</p>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="story-content">
                        <p>
                            HospitalMS was founded in 2020 by a team of healthcare professionals and technology experts
                            who recognized the need for better digital solutions in healthcare management. We saw hospitals
                            struggling with outdated systems, paper-based processes, and inefficient workflows.
                        </p>
                        <p>
                            Our journey began with a simple goal: to create a comprehensive, easy-to-use hospital management
                            system that would help healthcare providers focus on what matters most - patient care. Today,
                            we serve over 500 hospitals worldwide, processing millions of patient records securely.
                        </p>
                        <p>
                            We continue to evolve our platform based on real-world feedback from healthcare professionals,
                            ensuring that our solutions meet the ever-changing needs of the medical community.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="story-image">
                        <div class="story-placeholder">
                            <i class="fas fa-hospital-alt fa-3x mb-3"></i><br>
                            Hospital Management System<br>
                            <small>Image placeholder for company story</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Meet Our Team</h2>
                    <p class="section-subtitle">Dedicated professionals working to improve healthcare technology</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h4 class="team-name">Dr. John Smith</h4>
                        <p class="team-role">Chief Executive Officer</p>
                        <p class="team-description">
                            Former hospital administrator with 15+ years of experience in healthcare management and digital
                            transformation.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h4 class="team-name">Dr. Sarah Johnson</h4>
                        <p class="team-role">Chief Medical Officer</p>
                        <p class="team-description">
                            Board-certified physician with extensive experience in hospital operations and patient care
                            optimization.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-code"></i>
                        </div>
                        <h4 class="team-name">Michael Chen</h4>
                        <p class="team-role">Chief Technology Officer</p>
                        <p class="team-description">
                            Software engineer specializing in healthcare technology with expertise in secure, scalable
                            systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="values-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">What We Stand For</h2>
                    <p class="section-subtitle">The principles that guide everything we do</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">Security First</h4>
                            <p class="value-text">
                                We prioritize data security and patient privacy with HIPAA compliance, encryption,
                                and industry-leading security measures.
                            </p>
                        </div>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">Innovation</h4>
                            <p class="value-text">
                                Continuously improving our platform with cutting-edge technology to stay ahead
                                of healthcare industry needs.
                            </p>
                        </div>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">User-Centric Design</h4>
                            <p class="value-text">
                                Building intuitive interfaces that healthcare professionals can use efficiently,
                                reducing training time and improving adoption.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">24/7 Support</h4>
                            <p class="value-text">
                                Providing round-the-clock technical support because healthcare never stops,
                                and neither do we.
                            </p>
                        </div>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">Partnership</h4>
                            <p class="value-text">
                                Working closely with healthcare providers to understand their needs and
                                deliver tailored solutions.
                            </p>
                        </div>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">Continuous Improvement</h4>
                            <p class="value-text">
                                Regularly updating our system based on user feedback and industry best practices
                                to ensure optimal performance.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection