@extends('defaultLayout.app')

@section('title', 'Contact Us - HospitalX Get in Touch')

@section('content')
    <!-- Hero section -->
    <section class="contact-hero bg-light">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 text-primary font-weight-bold mb-4">
                        <i class="fas fa-envelope mr-3"></i>Contact Us
                    </h1>
                    <p class="lead text-muted mb-4">
                        We're here to help you with any questions, concerns, or appointment requests.
                        Reach out to us through any of the channels below.
                    </p>
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <div class="contact-highlight p-3">
                                <i class="fas fa-phone-alt text-primary fa-2x mb-2"></i>
                                <h6 class="text-primary font-weight-bold">24/7 Hotline</h6>
                                <p class="text-muted mb-0">+1 (234) 567-8900</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="contact-highlight p-3">
                                <i class="fas fa-envelope text-success fa-2x mb-2"></i>
                                <h6 class="text-success font-weight-bold">Email Support</h6>
                                <p class="text-muted mb-0">info@hospitalx.com</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="contact-highlight p-3">
                                <i class="fas fa-clock text-info fa-2x mb-2"></i>
                                <h6 class="text-info font-weight-bold">Emergency</h6>
                                <p class="text-muted mb-0">Available 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <!-- Success alert section (hidden by default) -->
        <div id="successAlert" class="alert alert-success alert-dismissible fade d-none" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x mr-3"></i>
                <div>
                    <h5 class="alert-heading mb-1">Message Sent Successfully!</h5>
                    <p class="mb-0">Thank you for contacting us. We will get back to you within 24 hours.</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Main contact section -->
        <div class="row">
            <!-- Contact Form Column -->
            <div class="col-lg-8 mb-5">
                <div class="contact-form-card bg-white p-5 rounded-lg shadow-soft">
                    <h3 class="text-primary font-weight-bold mb-4">
                        <i class="fas fa-paper-plane mr-2"></i>Send us a Message
                    </h3>
                    <p class="text-muted mb-4">
                        Fill out the form below and we'll get back to you as soon as possible.
                        For urgent medical matters, please call our emergency line.
                    </p>

                    <form id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName" class="font-weight-bold">
                                        <i class="fas fa-user mr-1"></i>First Name *
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="firstName" name="firstName"
                                        required placeholder="Enter your first name">
                                    <div class="invalid-feedback">Please provide your first name.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName" class="font-weight-bold">
                                        <i class="fas fa-user mr-1"></i>Last Name *
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="lastName" name="lastName"
                                        required placeholder="Enter your last name">
                                    <div class="invalid-feedback">Please provide your last name.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold">
                                        <i class="fas fa-envelope mr-1"></i>Email Address *
                                    </label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                                        required placeholder="your.email@example.com">
                                    <div class="invalid-feedback">Please provide a valid email address.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="font-weight-bold">
                                        <i class="fas fa-phone mr-1"></i>Phone Number
                                    </label>
                                    <input type="tel" class="form-control form-control-lg" id="phone" name="phone"
                                        placeholder="(234) 567-8900">
                                    <small class="form-text text-muted">Optional - for faster response</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="font-weight-bold">
                                <i class="fas fa-tag mr-1"></i>Subject *
                            </label>
                            <select class="form-control form-control-lg" id="subject" name="subject" required>
                                <option value="">Select a subject...</option>
                                <option value="appointment">Schedule Appointment</option>
                                <option value="medical">Medical Inquiry</option>
                                <option value="billing">Billing Question</option>
                                <option value="insurance">Insurance & Coverage</option>
                                <option value="feedback">Feedback & Suggestions</option>
                                <option value="emergency">Emergency (Call Instead)</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select a subject for your message.</div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="font-weight-bold">
                                <i class="fas fa-comment-alt mr-1"></i>Message *
                            </label>
                            <textarea class="form-control form-control-lg" id="message" name="message" rows="6" required
                                placeholder="Please describe your inquiry in detail..."></textarea>
                            <div class="invalid-feedback">Please provide your message.</div>
                            <small class="form-text text-muted">
                                <span id="charCount">0</span>/500 characters
                            </small>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="consent" name="consent" required>
                                <label class="custom-control-label" for="consent">
                                    I agree to the <a href="#" class="text-primary">Privacy Policy</a> and
                                    consent to being contacted by HospitalX regarding my inquiry. *
                                </label>
                                <div class="invalid-feedback">You must agree to the privacy policy.</div>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="fas fa-paper-plane mr-2"></i>Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Information Column -->
            <div class="col-lg-4 mb-5">
                <div class="contact-info-card bg-white p-4 rounded-lg shadow-soft h-100">
                    <h4 class="text-primary font-weight-bold mb-4">
                        <i class="fas fa-info-circle mr-2"></i>Contact Information
                    </h4>

                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="contact-icon-wrapper mr-3">
                                <div class="contact-icon bg-primary text-white">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="text-dark font-weight-bold mb-1">Hospital Address</h6>
                                <p class="text-muted mb-0">
                                    123 Healthcare Street<br>
                                    Medical City, MC 12345<br>
                                    United States
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="contact-icon-wrapper mr-3">
                                <div class="contact-icon bg-success text-white">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="text-dark font-weight-bold mb-1">Phone Numbers</h6>
                                <p class="text-muted mb-1">
                                    <strong>Main:</strong> <a href="tel:+1234567890" class="text-muted">+1 (234)
                                        567-8900</a>
                                </p>
                                <p class="text-muted mb-0">
                                    <strong>Emergency:</strong> <a href="tel:+1234567891"
                                        class="text-danger font-weight-bold">+1 (234) 567-8911</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="contact-icon-wrapper mr-3">
                                <div class="contact-icon bg-info text-white">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="text-dark font-weight-bold mb-1">Email Addresses</h6>
                                <p class="text-muted mb-1">
                                    <strong>General:</strong> <a href="mailto:info@hospitalx.com"
                                        class="text-muted">info@hospitalx.com</a>
                                </p>
                                <p class="text-muted mb-0">
                                    <strong>Appointments:</strong> <a href="mailto:appointments@hospitalx.com"
                                        class="text-muted">appointments@hospitalx.com</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-start">
                            <div class="contact-icon-wrapper mr-3">
                                <div class="contact-icon bg-warning text-white">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="text-dark font-weight-bold mb-1">Operating Hours</h6>
                                <p class="text-muted mb-1">
                                    <strong>Monday - Friday:</strong> 8:00 AM - 6:00 PM
                                </p>
                                <p class="text-muted mb-1">
                                    <strong>Saturday:</strong> 9:00 AM - 4:00 PM
                                </p>
                                <p class="text-muted mb-0">
                                    <strong>Emergency:</strong> <span class="text-success font-weight-bold">24/7
                                        Available</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact Card -->
                    <div class="emergency-contact-card bg-danger text-white p-3 rounded mb-4">
                        <div class="text-center">
                            <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
                            <h6 class="font-weight-bold mb-2">Medical Emergency?</h6>
                            <p class="mb-3 small">For life-threatening emergencies, call immediately</p>
                            <a href="tel:+1234567891" class="btn btn-light btn-block font-weight-bold">
                                <i class="fas fa-phone-alt mr-2"></i>Emergency: (234) 567-8911
                            </a>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="social-media-section">
                        <h6 class="text-dark font-weight-bold mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a href="#" class="social-link bg-primary text-white mr-2">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-link bg-info text-white mr-2">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-link bg-danger text-white mr-2">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link bg-primary text-white">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map section -->
        <div class="map-section mb-5">
            <div class="text-center mb-4">
                <h3 class="text-primary font-weight-bold">
                    <i class="fas fa-map-marked-alt mr-2"></i>Find Our Location
                </h3>
                <p class="text-muted">Visit us at our main hospital campus</p>
            </div>

            <div class="map-container bg-white rounded-lg shadow-soft overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9476519598363!2d-73.99385368459395!3d40.74844097932881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1635180000000!5m2!1sen!2sus"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/Styles/contact.css') }}">
@endpush

@push('scripts')
    <script>
        // ========================================
        // CONTACT PAGE JAVASCRIPT
        // ========================================
        $(document).ready(function () {

            // ========================================
            // FORM VALIDATION AND SUBMISSION
            // ========================================
            $('#contactForm').on('submit', function (e) {
                e.preventDefault();

                const form = this;
                let isValid = true;

                // Validate required fields
                $(form).find('[required]').each(function () {
                    if (!this.checkValidity()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid').addClass('is-valid');
                    }
                });

                // Email validation
                const email = $('#email').val();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email && !emailRegex.test(email)) {
                    $('#email').addClass('is-invalid');
                    isValid = false;
                }

                if (isValid) {
                    // Show loading state
                    const submitBtn = $(form).find('button[type="submit"]');
                    const originalText = submitBtn.html();
                    submitBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Sending...');
                    submitBtn.prop('disabled', true);

                    // Simulate form submission (replace with actual AJAX call)
                    setTimeout(function () {
                        // Show success alert
                        $('#successAlert').removeClass('d-none').addClass('show');

                        // Reset form
                        form.reset();
                        $(form).find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');

                        // Restore button
                        submitBtn.html(originalText);
                        submitBtn.prop('disabled', false);

                        // Scroll to success message
                        $('html, body').animate({
                            scrollTop: $('#successAlert').offset().top - 100
                        }, 500);

                        // Auto-hide success message after 10 seconds
                        setTimeout(function () {
                            $('#successAlert').removeClass('show').addClass('d-none');
                        }, 10000);

                    }, 2000);
                } else {
                    // Add was-validated class to show validation feedback
                    $(form).addClass('was-validated');
                }
            });

            // ========================================
            // REAL-TIME VALIDATION
            // ========================================
            $('#contactForm input, #contactForm select, #contactForm textarea').on('blur input', function () {
                const $this = $(this);

                if (this.checkValidity()) {
                    $this.removeClass('is-invalid').addClass('is-valid');
                } else if ($this.val()) {
                    $this.removeClass('is-valid').addClass('is-invalid');
                }
            });

            // ========================================
            // CHARACTER COUNTER
            // ========================================
            $('#message').on('input', function () {
                const current = $(this).val().length;
                const max = 500;
                $('#charCount').text(current);

                if (current > max) {
                    $('#charCount').addClass('text-danger').removeClass('text-primary');
                    $(this).addClass('is-invalid');
                } else {
                    $('#charCount').removeClass('text-danger').addClass('text-primary');
                    if (current > 0) {
                        $(this).removeClass('is-invalid').addClass('is-valid');
                    }
                }
            });

            // ========================================
            // PHONE NUMBER FORMATTING
            // ========================================
            $('#phone').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length >= 6) {
                    value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
                } else if (value.length >= 3) {
                    value = value.replace(/(\d{3})(\d{0,3})/, '($1) $2');
                }
                $(this).val(value);
            });

            // ========================================
            // EMERGENCY SUBJECT ALERT
            // ========================================
            $('#subject').on('change', function () {
                if ($(this).val() === 'emergency') {
                    if (typeof HospitalX !== 'undefined') {
                        HospitalX.showToast('For medical emergencies, please call (234) 567-8911 immediately!', 'warning');
                    } else {
                        alert('For medical emergencies, please call (234) 567-8911 immediately!');
                    }
                }
            });

            // ========================================
            // SMOOTH ANIMATIONS ON SCROLL
            // ========================================
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

            // Observe contact items and form sections
            $('.contact-item, .contact-form-card, .contact-info-card, .map-container').each(function () {
                this.style.opacity = '0';
                this.style.transform = 'translateY(30px)';
                this.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                observer.observe(this);
            });
        });
    </script>
@endpush