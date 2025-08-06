@extends('Default Layout.default')

@section('title', 'Services - Hospital Management System')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/Styles/services.css') }}">
@endsection

@section('content')

    <!-- Page Header -->
    <section class="services-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="services-title">Our Services</h1>
                    <p class="services-subtitle">Comprehensive healthcare management solutions designed for modern hospitals
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Services -->
    <section class="main-services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Core Services</h2>
                    <p class="section-subtitle">Essential tools to streamline your hospital operations</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3 class="service-title">Patient Management</h3>
                        <p class="service-description">
                            Complete patient record management with registration, medical history, and treatment tracking.
                        </p>
                        <ul class="service-features">
                            <li>Electronic Health Records (EHR)</li>
                            <li>Patient Registration System</li>
                            <li>Medical History Tracking</li>
                            <li>Discharge Planning</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3 class="service-title">Appointment Scheduling</h3>
                        <p class="service-description">
                            Smart scheduling system to optimize doctor availability and reduce patient waiting times.
                        </p>
                        <ul class="service-features">
                            <li>Online Appointment Booking</li>
                            <li>Doctor Availability Management</li>
                            <li>Automated Reminders</li>
                            <li>Queue Management</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-file-medical-alt"></i>
                        </div>
                        <h3 class="service-title">Laboratory Management</h3>
                        <p class="service-description">
                            Comprehensive lab management with test ordering, result tracking, and report generation.
                        </p>
                        <ul class="service-features">
                            <li>Test Order Management</li>
                            <li>Result Processing</li>
                            <li>Report Generation</li>
                            <li>Quality Control</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-pills"></i>
                        </div>
                        <h3 class="service-title">Pharmacy Management</h3>
                        <p class="service-description">
                            Complete pharmacy operations including inventory, prescriptions, and medication tracking.
                        </p>
                        <ul class="service-features">
                            <li>Inventory Management</li>
                            <li>Prescription Processing</li>
                            <li>Drug Interaction Alerts</li>
                            <li>Expiry Date Tracking</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <h3 class="service-title">Billing & Finance</h3>
                        <p class="service-description">
                            Automated billing system with insurance processing and financial reporting capabilities.
                        </p>
                        <ul class="service-features">
                            <li>Automated Billing</li>
                            <li>Insurance Processing</li>
                            <li>Payment Tracking</li>
                            <li>Financial Reports</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-bed"></i>
                        </div>
                        <h3 class="service-title">Bed Management</h3>
                        <p class="service-description">
                            Real-time bed availability tracking and patient admission management system.
                        </p>
                        <ul class="service-features">
                            <li>Real-time Bed Status</li>
                            <li>Admission Management</li>
                            <li>Transfer Coordination</li>
                            <li>Occupancy Reports</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Services -->
    <section class="additional-services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Additional Features</h2>
                    <p class="section-subtitle">Advanced capabilities to enhance your hospital operations</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="additional-service-item">
                        <div class="additional-service-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="additional-service-content">
                            <h4 class="additional-service-title">Analytics & Reporting</h4>
                            <p class="additional-service-text">
                                Comprehensive dashboard with real-time analytics, custom reports, and performance metrics
                                to help make data-driven decisions.
                            </p>
                        </div>
                    </div>

                    <div class="additional-service-item">
                        <div class="additional-service-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="additional-service-content">
                            <h4 class="additional-service-title">Security & Compliance</h4>
                            <p class="additional-service-text">
                                HIPAA compliant platform with advanced security features, data encryption,
                                and regular security audits.
                            </p>
                        </div>
                    </div>

                    <div class="additional-service-item">
                        <div class="additional-service-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="additional-service-content">
                            <h4 class="additional-service-title">Mobile Access</h4>
                            <p class="additional-service-text">
                                Access your hospital management system from any device with our responsive
                                design and mobile applications.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="additional-service-item">
                        <div class="additional-service-icon">
                            <i class="fas fa-cloud"></i>
                        </div>
                        <div class="additional-service-content">
                            <h4 class="additional-service-title">Cloud Integration</h4>
                            <p class="additional-service-text">
                                Secure cloud-based solution with automatic backups, 99.9% uptime guarantee,
                                and scalable infrastructure.
                            </p>
                        </div>
                    </div>

                    <div class="additional-service-item">
                        <div class="additional-service-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="additional-service-content">
                            <h4 class="additional-service-title">24/7 Support</h4>
                            <p class="additional-service-text">
                                Round-the-clock technical support with dedicated account managers and
                                comprehensive training programs.
                            </p>
                        </div>
                    </div>

                    <div class="additional-service-item">
                        <div class="additional-service-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="additional-service-content">
                            <h4 class="additional-service-title">Custom Integration</h4>
                            <p class="additional-service-text">
                                Seamless integration with existing hospital systems and third-party
                                applications through our flexible API.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Highlights -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Why Choose Our Services</h2>
                    <p class="section-subtitle">Numbers that speak for our commitment to excellence</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="feature-highlight">
                        <div class="feature-number">500+</div>
                        <div class="feature-label">Hospitals Served</div>
                        <div class="feature-text">Trusted by healthcare providers worldwide</div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="feature-highlight">
                        <div class="feature-number">99.9%</div>
                        <div class="feature-label">Uptime</div>
                        <div class="feature-text">Reliable system availability guaranteed</div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="feature-highlight">
                        <div class="feature-number">50K+</div>
                        <div class="feature-label">Patients Managed</div>
                        <div class="feature-text">Successful patient record management</div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="feature-highlight">
                        <div class="feature-number">24/7</div>
                        <div class="feature-label">Support</div>
                        <div class="feature-text">Always available when you need us</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="services-cta-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="services-cta-title">Ready to Transform Your Hospital?</h2>
                    <p class="services-cta-text">
                        Join hundreds of hospitals that have streamlined their operations with HospitalMS.
                        Start your digital transformation today.
                    </p>
                    <a href="{{ url('/contact') }}" class="services-cta-btn">Request a Demo</a>
                </div>
            </div>
        </div>
    </section>

@endsection