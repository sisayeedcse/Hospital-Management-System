@extends('defaultLayout.app')

@section('title', 'Login - HospitalX Secure Access')

@section('content')
    <!-- Login page container -->
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

                        <div class="auth-features">
                            <div class="feature-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="feature-icon mr-3">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Secure Access</h5>
                                        <p class="mb-0 text-white-50">Your medical data is protected with enterprise-grade
                                            security</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="feature-icon mr-3">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Easy Appointments</h5>
                                        <p class="mb-0 text-white-50">Schedule and manage your healthcare appointments
                                            online</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="feature-icon mr-3">
                                        <i class="fas fa-file-medical-alt"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Medical Records</h5>
                                        <p class="mb-0 text-white-50">Access your complete medical history anytime, anywhere
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="auth-footer-info mt-5 text-center">
                            <p class="text-white-50 mb-2">Need help? Contact our support team</p>
                            <p class="font-weight-bold">
                                <i class="fas fa-phone mr-2"></i>+1 (234) 567-8900
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="col-lg-6 auth-form-side d-flex align-items-center">
                    <div class="auth-form-container w-100 p-4 p-lg-5">
                        <!-- Mobile Logo (visible only on small screens) -->
                        <div class="mobile-logo text-center mb-4 d-lg-none">
                            <i class="fas fa-hospital-alt text-primary fa-3x mb-2"></i>
                            <h3 class="text-primary font-weight-bold">HospitalX</h3>
                        </div>

                        <!-- Login Form Header -->
                        <div class="auth-form-header text-center mb-5">
                            <h1 class="auth-title text-dark font-weight-bold mb-3">Welcome Back</h1>
                            <p class="auth-subtitle text-muted">Sign in to access your healthcare dashboard</p>
                        </div>

                        <!-- Success/Error Alerts -->
                        <div id="loginAlert" class="alert alert-dismissible fade d-none" role="alert">
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

                        <!-- Login Form -->
                        <form id="loginForm" class="auth-form" novalidate>
                            <div class="form-group mb-4">
                                <label for="email" class="form-label font-weight-bold">
                                    <i class="fas fa-envelope mr-2"></i>Email Address
                                </label>
                                <input type="email" class="form-control form-control-lg auth-input" id="email" name="email"
                                    required placeholder="Enter your email address" autocomplete="email">
                                <div class="invalid-feedback">Please provide a valid email address.</div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password" class="form-label font-weight-bold">
                                    <i class="fas fa-lock mr-2"></i>Password
                                </label>
                                <div class="password-input-wrapper position-relative">
                                    <input type="password" class="form-control form-control-lg auth-input" id="password"
                                        name="password" required placeholder="Enter your password"
                                        autocomplete="current-password">
                                    <button type="button" class="password-toggle-btn" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback">Password is required.</div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rememberMe"
                                            name="rememberMe">
                                        <label class="custom-control-label text-muted" for="rememberMe">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="{{ route('forgot') }}" class="forgot-password-link text-primary">
                                        Forgot Password?
                                    </a>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block auth-submit-btn">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                                </button>
                            </div>

                            <div class="auth-divider text-center mb-4">
                                <span class="text-muted">or</span>
                            </div>

                            <div class="social-login-buttons mb-4">
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <button type="button" class="btn btn-outline-danger btn-block social-btn">
                                            <i class="fab fa-google mr-2"></i>Google
                                        </button>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <button type="button" class="btn btn-outline-primary btn-block social-btn">
                                            <i class="fab fa-facebook-f mr-2"></i>Facebook
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="auth-footer text-center">
                                <p class="text-muted mb-0">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="text-primary font-weight-bold">Sign up here</a>
                                </p>
                            </div>
                        </form>

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
    <link rel="stylesheet" href="{{ asset('assets/Styles/login.css') }}">
@endpush

@push('scripts')
    <script>
        // ========================================
        // LOGIN PAGE JAVASCRIPT
        // ========================================
        $(document).ready(function () {

            // ========================================
            // PASSWORD TOGGLE FUNCTIONALITY
            // ========================================
            $('#togglePassword').on('click', function () {
                const passwordField = $('#password');
                const icon = $(this).find('i');

                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // ========================================
            // FORM VALIDATION AND SUBMISSION
            // ========================================
            $('#loginForm').on('submit', function (e) {
                e.preventDefault();

                const form = this;
                let isValid = true;

                // Reset previous validation states
                $(form).find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');

                // Validate email
                const email = $('#email').val().trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!email) {
                    $('#email').addClass('is-invalid');
                    isValid = false;
                } else if (!emailRegex.test(email)) {
                    $('#email').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#email').addClass('is-valid');
                }

                // Validate password
                const password = $('#password').val();
                if (!password || password.length < 6) {
                    $('#password').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#password').addClass('is-valid');
                }

                if (isValid) {
                    // Show loading state
                    const submitBtn = $(form).find('button[type="submit"]');
                    const originalText = submitBtn.html();
                    submitBtn.addClass('btn-loading').prop('disabled', true);

                    // Simulate API call (replace with actual login logic)
                    setTimeout(function () {
                        // Simulate different outcomes
                        const shouldSucceed = Math.random() > 0.3; // 70% success rate for demo

                        if (shouldSucceed) {
                            showAlert('success', 'Login Successful!', 'Welcome back! Redirecting to your dashboard...');

                            // Redirect after 2 seconds
                            setTimeout(function () {
                                window.location.href = '/dashboard'; // Replace with actual dashboard route
                            }, 2000);
                        } else {
                            showAlert('danger', 'Login Failed', 'Invalid email or password. Please try again.');

                            // Restore button
                            submitBtn.removeClass('btn-loading').prop('disabled', false).html(originalText);
                        }
                    }, 2000);
                } else {
                    // Add was-validated class to show validation feedback
                    $(form).addClass('was-validated');
                }
            });

            // ========================================
            // REAL-TIME VALIDATION
            // ========================================
            $('#email, #password').on('blur input', function () {
                const $this = $(this);
                const value = $this.val().trim();

                if ($this.attr('id') === 'email') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (value && emailRegex.test(value)) {
                        $this.removeClass('is-invalid').addClass('is-valid');
                    } else if (value) {
                        $this.removeClass('is-valid').addClass('is-invalid');
                    }
                } else if ($this.attr('id') === 'password') {
                    if (value && value.length >= 6) {
                        $this.removeClass('is-invalid').addClass('is-valid');
                    } else if (value) {
                        $this.removeClass('is-valid').addClass('is-invalid');
                    }
                }
            });

            // ========================================
            // SOCIAL LOGIN HANDLERS
            // ========================================
            $('.social-btn').on('click', function () {
                const provider = $(this).text().trim();

                if (typeof HospitalX !== 'undefined') {
                    HospitalX.showToast(`${provider} login integration would be handled here`, 'info');
                } else {
                    alert(`${provider} login integration would be handled here`);
                }
            });

            // ========================================
            // UTILITY FUNCTIONS
            // ========================================
            function showAlert(type, heading, message) {
                const alert = $('#loginAlert');
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
            }

            // ========================================
            // REMEMBER ME FUNCTIONALITY
            // ========================================
            // Load saved email if remember me was checked
            if (localStorage.getItem('rememberEmail')) {
                $('#email').val(localStorage.getItem('rememberEmail'));
                $('#rememberMe').prop('checked', true);
            }

            // Save email when form is submitted with remember me checked
            $('#loginForm').on('submit', function () {
                if ($('#rememberMe').is(':checked')) {
                    localStorage.setItem('rememberEmail', $('#email').val());
                } else {
                    localStorage.removeItem('rememberEmail');
                }
            });
        });
    </script>
@endpush