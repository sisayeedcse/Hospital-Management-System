@extends('defaultLayout.app')

@section('title', 'Forgot Password - HospitalX Account Recovery')

@section('content')
    <!-- Forgot password page container -->
    <div class="auth-container">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <!-- Left Side - Branding & Information -->
                <div class="col-lg-6 d-none d-lg-flex auth-branding-side">
                    <div
                        class="auth-branding-content d-flex flex-column justify-content-center align-items-center text-white p-5">
                        <div class="text-center mb-5">
                            <div class="auth-logo mb-4">
                                <i class="fas fa-hospital-alt fa-4x mb-3"></i>
                                <h2 class="font-weight-bold">HospitalX</h2>
                                <p class="lead mb-0">Healthcare Management System</p>
                            </div>
                        </div>

                        <div class="recovery-info">
                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="info-icon mr-3">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Secure Recovery</h5>
                                        <p class="mb-0 text-white-50">Your account security is our top priority</p>
                                    </div>
                                </div>
                            </div>

                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="info-icon mr-3">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Email Verification</h5>
                                        <p class="mb-0 text-white-50">We'll send a secure reset link to your email</p>
                                    </div>
                                </div>
                            </div>

                            <div class="info-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="info-icon mr-3">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Quick Process</h5>
                                        <p class="mb-0 text-white-50">Reset your password in just a few simple steps</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="auth-footer-info mt-5 text-center">
                            <p class="text-white-50 mb-2">Need immediate assistance?</p>
                            <p class="font-weight-bold">
                                <i class="fas fa-phone mr-2"></i>+1 (234) 567-8900
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Recovery Form -->
                <div class="col-lg-6 auth-form-side d-flex align-items-center">
                    <div class="auth-form-container w-100 p-4 p-lg-5">
                        <!-- Mobile Logo (visible only on small screens) -->
                        <div class="mobile-logo text-center mb-4 d-lg-none">
                            <i class="fas fa-hospital-alt text-primary fa-3x mb-2"></i>
                            <h3 class="text-primary font-weight-bold">HospitalX</h3>
                        </div>

                        <!-- Recovery Form Header -->
                        <div class="auth-form-header text-center mb-5">
                            <div class="recovery-icon mb-4">
                                <i class="fas fa-key text-primary fa-4x"></i>
                            </div>
                            <h1 class="auth-title text-dark font-weight-bold mb-3">Forgot Password?</h1>
                            <p class="auth-subtitle text-muted">
                                Don't worry! Enter your email address and we'll send you a link to reset your password.
                            </p>
                        </div>

                        <!-- Success/Error Alerts -->
                        <div id="recoveryAlert" class="alert alert-dismissible fade d-none" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="alert-icon fa-2x mr-3"></i>
                                <div>
                                    <h6 class="alert-heading mb-1"></h6>
                                    <p class="mb-0 alert-message"></p>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Password Recovery Form -->
                        <form id="recoveryForm" class="auth-form" novalidate>
                            <div class="form-group mb-4">
                                <label for="email" class="form-label font-weight-bold">
                                    <i class="fas fa-envelope mr-2"></i>Email Address
                                </label>
                                <input type="email" class="form-control form-control-lg auth-input" id="email" name="email"
                                    required placeholder="Enter your registered email address" autocomplete="email">
                                <div class="invalid-feedback">Please provide a valid email address.</div>
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Enter the email address associated with your HospitalX account
                                </small>
                            </div>

                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block auth-submit-btn">
                                    <i class="fas fa-paper-plane mr-2"></i>Send Reset Link
                                </button>
                            </div>

                            <!-- Security Notice -->
                            <div class="security-notice bg-light p-3 rounded mb-4">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-shield-alt text-success fa-2x mr-3 mt-1"></i>
                                    <div>
                                        <h6 class="mb-2 font-weight-bold text-success">Security Information</h6>
                                        <ul class="mb-0 small text-muted list-unstyled">
                                            <li class="mb-1">
                                                <i class="fas fa-check text-success mr-2"></i>
                                                Reset links expire after 1 hour for security
                                            </li>
                                            <li class="mb-1">
                                                <i class="fas fa-check text-success mr-2"></i>
                                                Only one reset link is active at a time
                                            </li>
                                            <li class="mb-0">
                                                <i class="fas fa-check text-success mr-2"></i>
                                                We'll never ask for your password via email
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Alternative Options -->
                            <div class="alternative-options text-center mb-4">
                                <h6 class="text-muted mb-3">Other Options</h6>

                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <a href="tel:+1234567890" class="btn btn-outline-primary btn-block">
                                            <i class="fas fa-phone mr-2"></i>Call Support
                                        </a>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <a href="{{ route('contact') }}" class="btn btn-outline-info btn-block">
                                            <i class="fas fa-envelope mr-2"></i>Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Back to Login -->
                            <div class="auth-footer text-center">
                                <p class="text-muted mb-0">
                                    Remember your password?
                                    <a href="{{ route('login') }}" class="text-primary font-weight-bold">
                                        <i class="fas fa-arrow-left mr-1"></i>Back to Login
                                    </a>
                                </p>
                            </div>
                        </form>

                        <!-- Instructions After Email Sent (Hidden by default) -->
                        <div id="emailSentInstructions" class="email-sent-container d-none">
                            <div class="text-center mb-4">
                                <div class="email-sent-icon mb-4">
                                    <i class="fas fa-envelope-open text-success fa-4x"></i>
                                </div>
                                <h2 class="text-success font-weight-bold mb-3">Check Your Email</h2>
                                <p class="text-muted mb-4">
                                    We've sent a password reset link to <strong id="sentEmailAddress"></strong>
                                </p>
                            </div>

                            <div class="email-instructions bg-light p-4 rounded mb-4">
                                <h6 class="font-weight-bold mb-3">
                                    <i class="fas fa-list-ol mr-2"></i>Next Steps:
                                </h6>
                                <ol class="mb-0 text-muted">
                                    <li class="mb-2">Check your email inbox (and spam folder)</li>
                                    <li class="mb-2">Click the "Reset Password" link in the email</li>
                                    <li class="mb-2">Create a new secure password</li>
                                    <li class="mb-0">Log in with your new password</li>
                                </ol>
                            </div>

                            <div class="resend-section text-center mb-4">
                                <p class="text-muted mb-2">Didn't receive the email?</p>
                                <button type="button" class="btn btn-outline-primary" id="resendEmail" disabled>
                                    <i class="fas fa-redo mr-2"></i>Resend Email (<span id="resendTimer">60</span>s)
                                </button>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('login') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left mr-2"></i>Back to Login
                                </a>
                            </div>
                        </div>

                        <!-- Emergency Access Note -->
                        <div class="emergency-access-note mt-4 p-3 bg-light rounded">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle text-warning fa-2x mr-3"></i>
                                <div>
                                    <h6 class="mb-1 font-weight-bold">Emergency Access</h6>
                                    <p class="mb-0 small text-muted">
                                        For medical emergencies, call <a href="tel:+1234567891"
                                            class="text-danger font-weight-bold">(234) 567-8911</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/Styles/forgot.css') }}">
@endpush

@push('scripts')
    <script>
        // ========================================
        // FORGOT PASSWORD PAGE JAVASCRIPT
        // ========================================
        $(document).ready(function () {
            let resendTimer = 60;
            let timerInterval;

            // ========================================
            // FORM VALIDATION AND SUBMISSION
            // ========================================
            $('#recoveryForm').on('submit', function (e) {
                e.preventDefault();

                const form = this;
                const email = $('#email').val().trim();

                // Reset validation states
                $('#email').removeClass('is-valid is-invalid');

                // Validate email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!email) {
                    $('#email').addClass('is-invalid');
                    $('.invalid-feedback', $('#email').parent()).text('Please provide your email address.');
                    return;
                } else if (!emailRegex.test(email)) {
                    $('#email').addClass('is-invalid');
                    $('.invalid-feedback', $('#email').parent()).text('Please provide a valid email address.');
                    return;
                } else {
                    $('#email').addClass('is-valid');
                }

                // Show loading state
                const submitBtn = $(form).find('button[type="submit"]');
                const originalText = submitBtn.html();
                submitBtn.addClass('btn-loading').prop('disabled', true);

                // Simulate API call (replace with actual password reset logic)
                setTimeout(function () {
                    // Simulate different outcomes
                    const shouldSucceed = Math.random() > 0.2; // 80% success rate for demo

                    if (shouldSucceed) {
                        // Show success and switch to email sent view
                        showEmailSentView(email);
                    } else {
                        // Show error
                        showAlert('danger', 'Email Not Found', 'No account found with this email address. Please check and try again.');

                        // Restore button
                        submitBtn.removeClass('btn-loading').prop('disabled', false).html(originalText);
                    }
                }, 2000);
            });

            // ========================================
            // REAL-TIME EMAIL VALIDATION
            // ========================================
            $('#email').on('blur input', function () {
                const email = $(this).val().trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (email && emailRegex.test(email)) {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                } else if (email) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                }
            });

            // ========================================
            // EMAIL SENT VIEW
            // ========================================
            function showEmailSentView(email) {
                // Hide the form and show email sent instructions
                $('#recoveryForm').fadeOut(400, function () {
                    $('#sentEmailAddress').text(email);
                    $('#emailSentInstructions').removeClass('d-none').hide().fadeIn(400);
                    startResendTimer();
                });

                // Scroll to top
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            }

            // ========================================
            // RESEND EMAIL FUNCTIONALITY
            // ========================================
            $('#resendEmail').on('click', function () {
                const email = $('#sentEmailAddress').text();
                const btn = $(this);
                const originalText = btn.html();

                // Show loading state
                btn.addClass('btn-loading').prop('disabled', true);

                // Simulate resend API call
                setTimeout(function () {
                    showAlert('info', 'Email Resent', 'Password reset link has been sent again to your email address.');

                    // Restore button and restart timer
                    btn.removeClass('btn-loading').html(originalText);
                    startResendTimer();
                }, 1500);
            });

            // ========================================
            // RESEND TIMER
            // ========================================
            function startResendTimer() {
                resendTimer = 60;
                $('#resendEmail').prop('disabled', true);

                timerInterval = setInterval(function () {
                    resendTimer--;
                    $('#resendTimer').text(resendTimer);

                    if (resendTimer <= 0) {
                        clearInterval(timerInterval);
                        $('#resendEmail').prop('disabled', false)
                            .html('<i class="fas fa-redo mr-2"></i>Resend Email');
                    }
                }, 1000);
            }

            // ========================================
            // UTILITY FUNCTIONS
            // ========================================
            function showAlert(type, heading, message) {
                const alert = $('#recoveryAlert');
                const icon = alert.find('.alert-icon');
                const headingEl = alert.find('.alert-heading');
                const messageEl = alert.find('.alert-message');

                // Set alert type
                alert.removeClass('alert-success alert-danger alert-warning alert-info')
                    .addClass(`alert-${type}`);

                // Set icon based on type
                icon.removeClass().addClass('alert-icon fa-2x mr-3');
                switch (type) {
                    case 'success':
                        icon.addClass('fas fa-check-circle text-success');
                        break;
                    case 'danger':
                        icon.addClass('fas fa-exclamation-circle text-danger');
                        break;
                    case 'warning':
                        icon.addClass('fas fa-exclamation-triangle text-warning');
                        break;
                    case 'info':
                        icon.addClass('fas fa-info-circle text-info');
                        break;
                }

                // Set content
                headingEl.text(heading);
                messageEl.text(message);

                // Show alert
                alert.removeClass('d-none').addClass('show');

                // Auto-hide after 5 seconds for non-success alerts
                if (type !== 'success') {
                    setTimeout(function () {
                        alert.removeClass('show').addClass('d-none');
                    }, 5000);
                }

                // Scroll to alert
                $('html, body').animate({
                    scrollTop: alert.offset().top - 100
                }, 500);
            }

            // ========================================
            // EMAIL SUGGESTIONS
            // ========================================
            const commonDomains = ['gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 'aol.com'];

            $('#email').on('blur', function () {
                const email = $(this).val().trim();
                if (email && email.includes('@')) {
                    const parts = email.split('@');
                    if (parts.length === 2 && parts[1]) {
                        const domain = parts[1].toLowerCase();

                        // Check for common typos
                        const suggestions = [];
                        commonDomains.forEach(function (commonDomain) {
                            if (domain !== commonDomain && levenshteinDistance(domain, commonDomain) <= 2) {
                                suggestions.push(parts[0] + '@' + commonDomain);
                            }
                        });

                        if (suggestions.length > 0) {
                            showEmailSuggestion(suggestions[0]);
                        }
                    }
                }
            });

            function levenshteinDistance(str1, str2) {
                const matrix = [];

                for (let i = 0; i <= str2.length; i++) {
                    matrix[i] = [i];
                }

                for (let j = 0; j <= str1.length; j++) {
                    matrix[0][j] = j;
                }

                for (let i = 1; i <= str2.length; i++) {
                    for (let j = 1; j <= str1.length; j++) {
                        if (str2.charAt(i - 1) === str1.charAt(j - 1)) {
                            matrix[i][j] = matrix[i - 1][j - 1];
                        } else {
                            matrix[i][j] = Math.min(
                                matrix[i - 1][j - 1] + 1,
                                matrix[i][j - 1] + 1,
                                matrix[i - 1][j] + 1
                            );
                        }
                    }
                }

                return matrix[str2.length][str1.length];
            }

            function showEmailSuggestion(suggestion) {
                if (typeof HospitalX !== 'undefined') {
                    HospitalX.showToast(`Did you mean: ${suggestion}?`, 'info');
                }
            }

            // ========================================
            // KEYBOARD SHORTCUTS
            // ========================================
            $(document).on('keydown', function (e) {
                // Enter key to submit form
                if (e.key === 'Enter' && $('#recoveryForm').is(':visible')) {
                    e.preventDefault();
                    $('#recoveryForm').submit();
                }

                // Escape key to go back to login
                if (e.key === 'Escape') {
                    window.location.href = '/login';
                }
            });

            // ========================================
            // CLEANUP ON PAGE UNLOAD
            // ========================================
            $(window).on('beforeunload', function () {
                if (timerInterval) {
                    clearInterval(timerInterval);
                }
            });
        });
    </script>
@endpush