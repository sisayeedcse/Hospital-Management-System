@extends('Default Layout.default')

@section('title', 'Login - Hospital Management System')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('assets/Styles/login.css') }}">
@endsection

@section('content')

    <div class="login-page">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-lg-6">
                    <div class="login-left-column">
                        <h1 class="login-heading">Welcome Back to HospitalMS</h1>
                        <p class="login-subheading">Your healthcare management solution</p>
                        <p class="login-description">
                            Sign in to access your hospital management dashboard and continue providing
                            exceptional patient care with our comprehensive digital platform.
                        </p>

                        <ul class="login-features">
                            <li>Secure patient record management</li>
                            <li>Real-time appointment scheduling</li>
                            <li>Comprehensive reporting tools</li>
                            <li>24/7 technical support</li>
                        </ul>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6">
                    <div class="login-right-column">
                        <h2 class="login-form-title">Sign In</h2>
                        <p class="login-form-subtitle">Enter your credentials to access your account</p>

                        <form method="POST" action="#" id="loginForm">
                            @csrf

                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email address" required>
                            </div>

                            <!-- Password Input -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" required>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="remember-me">
                                <div class="remember-checkbox">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </div>
                                <a href="#" class="forgot-password">Forgot Password?</a>
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="login-btn">Sign In</button>

                            <!-- Additional Links -->
                            <div class="login-links">
                                <p class="login-divider">Don't have an account?</p>
                                <a href="{{ url('/register') }}">Create Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection