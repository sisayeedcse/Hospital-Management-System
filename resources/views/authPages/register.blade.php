@extends('defaultLayout.app')

@section('title', 'Register - HospitalX Create Account')

@section('content')
    <!-- Registration page container -->
    <div class="auth-container">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <!-- Left Side - Registration Form -->
                <div class="col-lg-7 auth-form-side d-flex align-items-center">
                    <div class="auth-form-container w-100 p-4 p-lg-5">
                        <!-- Mobile Logo (visible only on small screens) -->
                        <div class="mobile-logo text-center mb-4 d-lg-none">
                            <i class="fas fa-hospital-alt text-primary fa-3x mb-2"></i>
                            <h3 class="text-primary font-weight-bold">HospitalX</h3>
                        </div>

                        <!-- Registration Form Header -->
                        <div class="auth-form-header text-center mb-4">
                            <h1 class="auth-title text-dark font-weight-bold mb-3">Create Account</h1>
                            <p class="auth-subtitle text-muted">Join HospitalX to manage your healthcare journey</p>
                        </div>

                        <!-- Success/Error Alerts -->
                        <div id="registerAlert" class="alert alert-dismissible fade d-none" role="alert">
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

                        <!-- Registration Steps Indicator -->
                        <div class="registration-steps mb-4">
                            <div class="step-indicator d-flex justify-content-between">
                                <div class="step active" data-step="1">
                                    <div class="step-circle">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="step-text">Personal Info</span>
                                </div>
                                <div class="step" data-step="2">
                                    <div class="step-circle">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <span class="step-text">Account Setup</span>
                                </div>
                                <div class="step" data-step="3">
                                    <div class="step-circle">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <span class="step-text">Verification</span>
                                </div>
                            </div>
                        </div>

                        <!-- Registration Form -->
                        <form id="registerForm" class="auth-form" novalidate>
                            <!-- Step 1: Personal Information -->
                            <div class="form-step active" id="step1">
                                <h4 class="step-title text-primary mb-4">
                                    <i class="fas fa-user-plus mr-2"></i>Personal Information
                                </h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstName" class="form-label font-weight-bold">
                                                <i class="fas fa-user mr-2"></i>First Name *
                                            </label>
                                            <input type="text" class="form-control form-control-lg auth-input"
                                                id="firstName" name="firstName" required placeholder="Enter your first name"
                                                autocomplete="given-name">
                                            <div class="invalid-feedback">Please provide your first name.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="lastName" class="form-label font-weight-bold">
                                                <i class="fas fa-user mr-2"></i>Last Name *
                                            </label>
                                            <input type="text" class="form-control form-control-lg auth-input" id="lastName"
                                                name="lastName" required placeholder="Enter your last name"
                                                autocomplete="family-name">
                                            <div class="invalid-feedback">Please provide your last name.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="dateOfBirth" class="form-label font-weight-bold">
                                                <i class="fas fa-calendar mr-2"></i>Date of Birth *
                                            </label>
                                            <input type="date" class="form-control form-control-lg auth-input"
                                                id="dateOfBirth" name="dateOfBirth" required autocomplete="bday">
                                            <div class="invalid-feedback">Please provide your date of birth.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="gender" class="form-label font-weight-bold">
                                                <i class="fas fa-venus-mars mr-2"></i>Gender *
                                            </label>
                                            <select class="form-control form-control-lg auth-input" id="gender"
                                                name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                                <option value="prefer-not-to-say">Prefer not to say</option>
                                            </select>
                                            <div class="invalid-feedback">Please select your gender.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="phone" class="form-label font-weight-bold">
                                        <i class="fas fa-phone mr-2"></i>Phone Number *
                                    </label>
                                    <input type="tel" class="form-control form-control-lg auth-input" id="phone"
                                        name="phone" required placeholder="(234) 567-8900" autocomplete="tel">
                                    <div class="invalid-feedback">Please provide a valid phone number.</div>
                                </div>

                                <div class="form-navigation">
                                    <button type="button" class="btn btn-primary btn-lg" id="nextStep1">
                                        Next Step <i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 2: Account Setup -->
                            <div class="form-step" id="step2">
                                <h4 class="step-title text-primary mb-4">
                                    <i class="fas fa-envelope mr-2"></i>Account Setup
                                </h4>

                                <div class="form-group mb-3">
                                    <label for="email" class="form-label font-weight-bold">
                                        <i class="fas fa-envelope mr-2"></i>Email Address *
                                    </label>
                                    <input type="email" class="form-control form-control-lg auth-input" id="email"
                                        name="email" required placeholder="Enter your email address" autocomplete="email">
                                    <div class="invalid-feedback">Please provide a valid email address.</div>
                                    <small class="form-text text-muted">This will be your login username</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label font-weight-bold">
                                        <i class="fas fa-lock mr-2"></i>Password *
                                    </label>
                                    <div class="password-input-wrapper position-relative">
                                        <input type="password" class="form-control form-control-lg auth-input" id="password"
                                            name="password" required placeholder="Create a strong password"
                                            autocomplete="new-password">
                                        <button type="button" class="password-toggle-btn" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback password-feedback">Password must be at least 8 characters
                                        long.</div>

                                    <!-- Password Strength Indicator -->
                                    <div class="password-strength mt-2">
                                        <div class="strength-meter">
                                            <div class="strength-bar"></div>
                                        </div>
                                        <small class="strength-text text-muted">Password strength: <span
                                                class="strength-level">Weak</span></small>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="confirmPassword" class="form-label font-weight-bold">
                                        <i class="fas fa-lock mr-2"></i>Confirm Password *
                                    </label>
                                    <div class="password-input-wrapper position-relative">
                                        <input type="password" class="form-control form-control-lg auth-input"
                                            id="confirmPassword" name="confirmPassword" required
                                            placeholder="Confirm your password" autocomplete="new-password">
                                        <button type="button" class="password-toggle-btn" id="toggleConfirmPassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback">Passwords do not match.</div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="emergencyContact" class="form-label font-weight-bold">
                                        <i class="fas fa-phone-alt mr-2"></i>Emergency Contact
                                    </label>
                                    <input type="tel" class="form-control form-control-lg auth-input" id="emergencyContact"
                                        name="emergencyContact" placeholder="Emergency contact number" autocomplete="tel">
                                    <small class="form-text text-muted">Optional - for medical emergencies</small>
                                </div>

                                <div class="form-navigation d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary btn-lg" id="prevStep2">
                                        <i class="fas fa-arrow-left mr-2"></i>Previous
                                    </button>
                                    <button type="button" class="btn btn-primary btn-lg" id="nextStep2">
                                        Next Step <i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 3: Terms and Verification -->
                            <div class="form-step" id="step3">
                                <h4 class="step-title text-primary mb-4">
                                    <i class="fas fa-check mr-2"></i>Terms & Verification
                                </h4>

                                <div class="terms-section mb-4">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="termsOfService"
                                            name="termsOfService" required>
                                        <label class="custom-control-label" for="termsOfService">
                                            I agree to the <a href="#" class="text-primary" data-toggle="modal"
                                                data-target="#termsModal">Terms of Service</a> *
                                        </label>
                                        <div class="invalid-feedback">You must agree to the Terms of Service.</div>
                                    </div>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="privacyPolicy"
                                            name="privacyPolicy" required>
                                        <label class="custom-control-label" for="privacyPolicy">
                                            I agree to the <a href="#" class="text-primary" data-toggle="modal"
                                                data-target="#privacyModal">Privacy Policy</a> *
                                        </label>
                                        <div class="invalid-feedback">You must agree to the Privacy Policy.</div>
                                    </div>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="marketingEmails"
                                            name="marketingEmails">
                                        <label class="custom-control-label" for="marketingEmails">
                                            I want to receive healthcare tips and updates via email
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox mb-4">
                                        <input type="checkbox" class="custom-control-input" id="smsNotifications"
                                            name="smsNotifications">
                                        <label class="custom-control-label" for="smsNotifications">
                                            I want to receive appointment reminders via SMS
                                        </label>
                                    </div>
                                </div>

                                <div class="verification-notice bg-light p-3 rounded mb-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-info-circle text-info fa-2x mr-3"></i>
                                        <div>
                                            <h6 class="mb-1 font-weight-bold">Email Verification Required</h6>
                                            <p class="mb-0 small text-muted">
                                                After registration, please check your email to verify your account before
                                                logging in.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-navigation d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary btn-lg" id="prevStep3">
                                        <i class="fas fa-arrow-left mr-2"></i>Previous
                                    </button>
                                    <button type="submit" class="btn btn-success btn-lg auth-submit-btn">
                                        <i class="fas fa-user-plus mr-2"></i>Create Account
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Login Link -->
                        <div class="auth-footer text-center mt-4">
                            <p class="text-muted mb-0">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-primary font-weight-bold">Sign in here</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Branding & Information -->
                <div class="col-lg-5 d-none d-lg-flex auth-branding-side">
                    <div
                        class="auth-branding-content d-flex flex-column justify-content-center align-items-center text-white p-5">
                        <div class="text-center mb-5">
                            <div class="auth-logo mb-4">
                                <i class="fas fa-hospital-alt fa-4x mb-3"></i>
                                <h2 class="font-weight-bold">HospitalX</h2>
                                <p class="lead mb-0">Healthcare Management System</p>
                            </div>
                        </div>

                        <div class="auth-benefits">
                            <div class="benefit-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="benefit-icon mr-3">
                                        <i class="fas fa-calendar-plus"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Easy Appointments</h5>
                                        <p class="mb-0 text-white-50">Schedule appointments with your preferred doctors</p>
                                    </div>
                                </div>
                            </div>

                            <div class="benefit-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="benefit-icon mr-3">
                                        <i class="fas fa-file-medical"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Medical Records</h5>
                                        <p class="mb-0 text-white-50">Access your complete medical history securely</p>
                                    </div>
                                </div>
                            </div>

                            <div class="benefit-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="benefit-icon mr-3">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Smart Reminders</h5>
                                        <p class="mb-0 text-white-50">Never miss appointments or medication schedules</p>
                                    </div>
                                </div>
                            </div>

                            <div class="benefit-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="benefit-icon mr-3">
                                        <i class="fas fa-user-md"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Expert Care</h5>
                                        <p class="mb-0 text-white-50">Connect with qualified healthcare professionals</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="auth-footer-info mt-5 text-center">
                            <p class="text-white-50 mb-2">Questions about registration?</p>
                            <p class="font-weight-bold">
                                <i class="fas fa-phone mr-2"></i>+1 (234) 567-8900
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/Styles/register.css') }}">
@endpush

@push('scripts')
    <script>
        // ========================================
        // REGISTRATION PAGE JAVASCRIPT
        // ========================================
        $(document).ready(function () {
            let currentStep = 1;
            const totalSteps = 3;

            // ========================================
            // STEP NAVIGATION
            // ========================================
            function showStep(step) {
                // Hide all steps
                $('.form-step').removeClass('active');
                $('.step').removeClass('active completed');

                // Show current step
                $(`#step${step}`).addClass('active');
                $(`.step[data-step="${step}"]`).addClass('active');

                // Mark previous steps as completed
                for (let i = 1; i < step; i++) {
                    $(`.step[data-step="${i}"]`).addClass('completed');
                }

                currentStep = step;
            }

            // Next Step Buttons
            $('#nextStep1').on('click', function () {
                if (validateStep(1)) {
                    showStep(2);
                }
            });

            $('#nextStep2').on('click', function () {
                if (validateStep(2)) {
                    showStep(3);
                }
            });

            // Previous Step Buttons
            $('#prevStep2').on('click', function () {
                showStep(1);
            });

            $('#prevStep3').on('click', function () {
                showStep(2);
            });

            // ========================================
            // STEP VALIDATION
            // ========================================
            function validateStep(step) {
                let isValid = true;
                const stepContainer = $(`#step${step}`);

                // Reset validation states
                stepContainer.find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');

                // Validate required fields in current step
                stepContainer.find('[required]').each(function () {
                    const $field = $(this);
                    const value = $field.val().trim();

                    if (!value) {
                        $field.addClass('is-invalid');
                        isValid = false;
                    } else {
                        // Additional validation based on field type
                        if ($field.attr('type') === 'email') {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(value)) {
                                $field.addClass('is-invalid');
                                isValid = false;
                            } else {
                                $field.addClass('is-valid');
                            }
                        } else if ($field.attr('id') === 'phone') {
                            const phoneRegex = /^\(\d{3}\) \d{3}-\d{4}$/;
                            if (!phoneRegex.test(value)) {
                                $field.addClass('is-invalid');
                                isValid = false;
                            } else {
                                $field.addClass('is-valid');
                            }
                        } else if ($field.attr('id') === 'password') {
                            if (value.length < 8) {
                                $field.addClass('is-invalid');
                                isValid = false;
                            } else {
                                $field.addClass('is-valid');
                            }
                        } else if ($field.attr('id') === 'confirmPassword') {
                            if (value !== $('#password').val()) {
                                $field.addClass('is-invalid');
                                isValid = false;
                            } else {
                                $field.addClass('is-valid');
                            }
                        } else {
                            $field.addClass('is-valid');
                        }
                    }
                });

                // Validate checkboxes in step 3
                if (step === 3) {
                    const requiredCheckboxes = stepContainer.find('input[type="checkbox"][required]');
                    requiredCheckboxes.each(function () {
                        if (!$(this).is(':checked')) {
                            $(this).addClass('is-invalid');
                            isValid = false;
                        } else {
                            $(this).removeClass('is-invalid');
                        }
                    });
                }

                return isValid;
            }

            // ========================================
            // PASSWORD FUNCTIONALITY
            // ========================================
            // Password toggle
            $('#togglePassword, #toggleConfirmPassword').on('click', function () {
                const targetId = $(this).attr('id') === 'togglePassword' ? '#password' : '#confirmPassword';
                const passwordField = $(targetId);
                const icon = $(this).find('i');

                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // Password strength checker
            $('#password').on('input', function () {
                const password = $(this).val();
                const strength = calculatePasswordStrength(password);

                $('.strength-bar').removeClass('weak fair good strong').addClass(strength.level);
                $('.strength-level').removeClass('weak fair good strong').addClass(strength.level).text(strength.text);
            });

            function calculatePasswordStrength(password) {
                let score = 0;

                if (password.length >= 8) score++;
                if (password.match(/[a-z]/)) score++;
                if (password.match(/[A-Z]/)) score++;
                if (password.match(/[0-9]/)) score++;
                if (password.match(/[^A-Za-z0-9]/)) score++;

                switch (score) {
                    case 0:
                    case 1:
                        return { level: 'weak', text: 'Weak' };
                    case 2:
                        return { level: 'fair', text: 'Fair' };
                    case 3:
                    case 4:
                        return { level: 'good', text: 'Good' };
                    case 5:
                        return { level: 'strong', text: 'Strong' };
                    default:
                        return { level: 'weak', text: 'Weak' };
                }
            }

            // ========================================
            // REAL-TIME VALIDATION
            // ========================================
            $('#registerForm input, #registerForm select').on('blur input', function () {
                const $this = $(this);
                const value = $this.val().trim();

                if ($this.attr('required') && value) {
                    // Validate based on field type
                    if ($this.attr('type') === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (emailRegex.test(value)) {
                            $this.removeClass('is-invalid').addClass('is-valid');
                        } else {
                            $this.removeClass('is-valid').addClass('is-invalid');
                        }
                    } else if ($this.attr('id') === 'confirmPassword') {
                        if (value === $('#password').val()) {
                            $this.removeClass('is-invalid').addClass('is-valid');
                        } else {
                            $this.removeClass('is-valid').addClass('is-invalid');
                        }
                    } else if ($this.attr('id') === 'phone') {
                        const phoneRegex = /^\(\d{3}\) \d{3}-\d{4}$/;
                        if (phoneRegex.test(value)) {
                            $this.removeClass('is-invalid').addClass('is-valid');
                        } else {
                            $this.removeClass('is-valid').addClass('is-invalid');
                        }
                    } else {
                        $this.removeClass('is-invalid').addClass('is-valid');
                    }
                }
            });

            // ========================================
            // PHONE NUMBER FORMATTING
            // ========================================
            $('#phone, #emergencyContact').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length >= 6) {
                    value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
                } else if (value.length >= 3) {
                    value = value.replace(/(\d{3})(\d{0,3})/, '($1) $2');
                }
                $(this).val(value);
            });

            // ========================================
            // FORM SUBMISSION
            // ========================================
            $('#registerForm').on('submit', function (e) {
                e.preventDefault();

                if (validateStep(3)) {
                    const submitBtn = $(this).find('button[type="submit"]');
                    const originalText = submitBtn.html();
                    submitBtn.addClass('btn-loading').prop('disabled', true);

                    // Simulate registration process
                    setTimeout(function () {
                        showAlert('success', 'Account Created Successfully!', 'Please check your email to verify your account before logging in.');

                        // Reset form after successful registration
                        setTimeout(function () {
                            window.location.href = '/login'; // Redirect to login page
                        }, 3000);
                    }, 3000);
                }
            });

            // ========================================
            // UTILITY FUNCTIONS
            // ========================================
            function showAlert(type, heading, message) {
                const alert = $('#registerAlert');
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

                // Scroll to top to show alert
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            }

            // ========================================
            // DATE OF BIRTH VALIDATION
            // ========================================
            $('#dateOfBirth').on('change', function () {
                const today = new Date();
                const birthDate = new Date($(this).val());
                const age = today.getFullYear() - birthDate.getFullYear();

                if (age < 18) {
                    $(this).addClass('is-invalid');
                    $('.invalid-feedback', $(this).parent()).text('You must be at least 18 years old to register.');
                } else if (age > 150) {
                    $(this).addClass('is-invalid');
                    $('.invalid-feedback', $(this).parent()).text('Please enter a valid date of birth.');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });
        });
    </script>
@endpush