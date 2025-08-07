@extends('Default Layout.default')

@section('title', 'Register - Hospital Management System')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/Styles/register.css') }}">
@endsection

@section('content')

    <div class="register-page">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-lg-6">
                    <div class="register-left-column">
                        <h1 class="register-heading">Join HospitalMS Today</h1>
                        <p class="register-subheading">Your digital healthcare journey starts here</p>
                        <p class="register-description">
                            Create your account to access our comprehensive hospital management system
                            and become part of a community dedicated to exceptional healthcare delivery.
                        </p>

                        <ul class="register-benefits">
                            <li>Access to patient management tools</li>
                            <li>Real-time appointment booking</li>
                            <li>Medical records and history</li>
                            <li>Secure communication platform</li>
                            <li>24/7 customer support</li>
                        </ul>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6">
                    <div class="register-right-column">
                        <h2 class="register-form-title">Create Account</h2>
                        <p class="register-form-subtitle">Fill out the form below to get started</p>

                        <form method="POST" action="#" id="registerForm">
                            @csrf

                            <!-- Name Fields -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="Enter your first name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Enter your last name" required>
                                </div>
                            </div>

                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email address" required>
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone number" required>
                            </div>

                            <!-- Password Fields -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Create a password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm your password" required>
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                            </div>

                            <!-- Gender Selection -->
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- User Role -->
                            <div class="form-group">
                                <label for="user_type">I am a</label>
                                <select class="form-control" id="user_type" name="user_type" required>
                                    <option value="">Select your role</option>
                                    <option value="patient">Patient</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="nurse">Nurse</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="terms-checkbox">
                                <input type="checkbox" id="terms" name="terms" required>
                                <label for="terms">
                                    I agree to the <a href="#">Terms and Conditions</a> and
                                    <a href="#">Privacy Policy</a> of HospitalMS
                                </label>
                            </div>

                            <!-- Register Button -->
                            <button type="submit" class="register-btn">Create Account</button>

                            <!-- Additional Links -->
                            <div class="register-links">
                                <p class="register-divider">Already have an account?</p>
                                <a href="{{ url('/login') }}">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection