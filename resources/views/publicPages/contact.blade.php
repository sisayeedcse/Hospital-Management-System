@extends('Default Layout.default')

@section('title', 'Contact Us - Hospital Management System')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/Styles/contact.css') }}">
@endsection

@section('content')

    <!-- Page Header -->
    <section class="contact-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="contact-title">Contact Us</h1>
                    <p class="contact-subtitle">Get in touch with our team for support, inquiries, or to schedule a demo</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="contact-info-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Get In Touch</h2>
                    <p class="section-subtitle">Multiple ways to reach our support team</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3 class="contact-info-title">Phone Support</h3>
                        <div class="contact-info-details">
                            <p><strong>Main Line:</strong><br><a href="tel:+15551234567">+1 (555) 123-4567</a></p>
                            <p><strong>Emergency Support:</strong><br><a href="tel:+15559876543">+1 (555) 987-6543</a></p>
                            <p><strong>Available:</strong> 24/7</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="contact-info-title">Email Support</h3>
                        <div class="contact-info-details">
                            <p><strong>General Inquiries:</strong><br><a
                                    href="mailto:info@hospitalms.com">info@hospitalms.com</a></p>
                            <p><strong>Technical Support:</strong><br><a
                                    href="mailto:support@hospitalms.com">support@hospitalms.com</a></p>
                            <p><strong>Sales:</strong><br><a href="mailto:sales@hospitalms.com">sales@hospitalms.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="contact-info-title">Visit Our Office</h3>
                        <div class="contact-info-details">
                            <p><strong>Address:</strong><br>123 Medical Street<br>Health City, HC 12345<br>United States</p>
                            <p><strong>Office Hours:</strong><br>Monday - Friday: 9:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="contact-form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Send Us a Message</h2>
                    <p class="section-subtitle">Fill out the form below and we'll get back to you within 24 hours</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="contact-form-container">
                        <form method="POST" action="#" id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name *</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName">Last Name *</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hospital">Hospital/Organization Name</label>
                                <input type="text" class="form-control" id="hospital" name="hospital">
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <select class="form-control" id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="demo">Request a Demo</option>
                                    <option value="support">Technical Support</option>
                                    <option value="sales">Sales Inquiry</option>
                                    <option value="general">General Question</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required
                                    placeholder="Please describe your inquiry in detail..."></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="contact-form-btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Office Hours -->
    <section class="office-hours-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Office Hours</h2>
                    <p class="section-subtitle">When you can reach us for support and assistance</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="hours-table">
                        <div class="hours-row">
                            <div class="hours-day">Monday - Friday</div>
                            <div class="hours-time">9:00 AM - 6:00 PM EST</div>
                        </div>
                        <div class="hours-row">
                            <div class="hours-day">Saturday</div>
                            <div class="hours-time">10:00 AM - 4:00 PM EST</div>
                        </div>
                        <div class="hours-row">
                            <div class="hours-day">Sunday</div>
                            <div class="hours-time">Closed</div>
                        </div>
                        <div class="hours-row">
                            <div class="hours-day">Emergency Support</div>
                            <div class="hours-time emergency">24/7 Available</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location & Map -->
    <section class="map-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Find Us</h2>
                    <p class="section-subtitle">Visit our headquarters or schedule a meeting</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="map-placeholder">
                        <i class="fas fa-map-marked-alt fa-3x mb-3"></i><br>
                        Interactive Map Placeholder<br>
                        <small>Google Maps integration would go here</small>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="location-info">
                        <h4 class="mb-4" style="color: #2c5aa0;">Location Details</h4>

                        <div class="location-item">
                            <div class="location-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <p class="location-text">
                                HospitalMS Headquarters<br>
                                123 Medical Street, Suite 500
                            </p>
                        </div>

                        <div class="location-item">
                            <div class="location-icon">
                                <i class="fas fa-city"></i>
                            </div>
                            <p class="location-text">
                                Health City, HC 12345<br>
                                United States
                            </p>
                        </div>

                        <div class="location-item">
                            <div class="location-icon">
                                <i class="fas fa-parking"></i>
                            </div>
                            <p class="location-text">
                                Free parking available<br>
                                Visitor spaces in front
                            </p>
                        </div>

                        <div class="location-item">
                            <div class="location-icon">
                                <i class="fas fa-subway"></i>
                            </div>
                            <p class="location-text">
                                Public transportation<br>
                                Metro Station: Medical Center
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection