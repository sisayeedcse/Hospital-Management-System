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

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Display Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="/register" id="registerForm">
                            @csrf

                            <!-- Name Fields -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="Enter your first name" value="{{ old('first_name') }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Enter your last name" value="{{ old('last_name') }}" required>
                                </div>
                            </div>

                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email address" value="{{ old('email') }}" required>
                            </div>

                            <!-- User Role - Moved Up -->
                            <div class="form-group">
                                <label for="role">I am a</label>
                                <select class="form-control" id="role" name="role" required onchange="toggleRoleFields()">
                                    <option value="">Select your role</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="patient" {{ old('role') == 'patient' ? 'selected' : '' }}>Patient</option>
                                </select>
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone number" value="{{ old('phone') }}" required>
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
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}" required>
                            </div>

                            <!-- Gender Selection -->
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select your gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <!-- Address Field (for all roles) -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="2"
                                    placeholder="Enter your address">{{ old('address') }}</textarea>
                            </div>

                            <!-- Doctor Specific Fields -->
                            <div id="doctorFields" style="display:none;">
                                <h5><i class="fas fa-user-md"></i> Doctor Information</h5>
                                <!-- Specialization for Doctor -->
                                <div class="form-group">
                                    <label for="specialization">Specialization</label>
                                    <select class="form-control" id="specialization" name="specialization">
                                        <option value="">Select your specialization</option>
                                        <option value="Cardiologist">Cardiologist</option>
                                        <option value="Dermatologist">Dermatologist</option>
                                        <option value="Neurologist">Neurologist</option>
                                        <option value="Orthopedic">Orthopedic</option>
                                        <option value="Psychiatrist">Psychiatrist</option>
                                        <option value="Pediatrician">Pediatrician</option>
                                        <option value="Gynecologist">Gynecologist</option>
                                        <option value="Urologist">Urologist</option>
                                        <option value="Ophthalmologist">Ophthalmologist</option>
                                        <option value="ENT Specialist">ENT Specialist</option>
                                        <option value="Dentist">Dentist</option>
                                        <option value="General Physician">General Physician</option>
                                        <option value="Emergency Medicine">Emergency Medicine</option>
                                        <option value="Anesthesiologist">Anesthesiologist</option>
                                    </select>
                                </div>

                                <!-- Department for Doctor -->
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select class="form-control" id="department" name="department">
                                        <option value="">Select department</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Neurology">Neurology</option>
                                        <option value="Orthopedics">Orthopedics</option>
                                        <option value="Pediatrics">Pediatrics</option>
                                        <option value="Gynecology">Gynecology</option>
                                        <option value="Emergency">Emergency</option>
                                        <option value="Surgery">Surgery</option>
                                        <option value="Internal Medicine">Internal Medicine</option>
                                        <option value="Radiology">Radiology</option>
                                        <option value="Pathology">Pathology</option>
                                    </select>
                                </div>

                                <!-- Experience for Doctor -->
                                <div class="form-group">
                                    <label for="experience">Years of Experience</label>
                                    <select class="form-control" id="experience" name="experience">
                                        <option value="">Select experience</option>
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Years</option>
                                        <option value="3">3 Years</option>
                                        <option value="4">4 Years</option>
                                        <option value="5">5 Years</option>
                                        <option value="6-10">6-10 Years</option>
                                        <option value="11-15">11-15 Years</option>
                                        <option value="16-20">16-20 Years</option>
                                        <option value="20+">20+ Years</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Patient Specific Fields -->
                            <div id="patientFields" style="display:none;">
                                <h5><i class="fas fa-user-injured"></i> Patient Information</h5>
                                <!-- Blood Group for Patient -->
                                <div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <select class="form-control" id="blood_group" name="blood_group">
                                        <option value="">Select blood group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Staff Specific Fields -->
                            <div id="staffFields" style="display:none;">
                                <h5><i class="fas fa-users"></i> Staff Information</h5>
                                <!-- Staff Role -->
                                <div class="form-group">
                                    <label for="staff_role">Staff Role</label>
                                    <select class="form-control" id="staff_role" name="staff_role">
                                        <option value="">Select staff role</option>
                                        <option value="Nurse">Nurse</option>
                                        <option value="Technician">Technician</option>
                                        <option value="Pharmacist">Pharmacist</option>
                                        <option value="Receptionist">Receptionist</option>
                                        <option value="Lab Technician">Lab Technician</option>
                                        <option value="Radiologist">Radiologist</option>
                                        <option value="Physiotherapist">Physiotherapist</option>
                                        <option value="Security">Security</option>
                                        <option value="Cleaner">Cleaner</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- Assigned Room -->
                                <div class="form-group">
                                    <label for="assigned_room">Assigned Room/Department</label>
                                    <input type="text" class="form-control" id="assigned_room" name="assigned_room"
                                        placeholder="Enter assigned room or department">
                                </div>
                            </div>

                            <script>
                                function toggleRoleFields() {
                                    var role = document.getElementById('role').value;
                                    var doctorFields = document.getElementById('doctorFields');
                                    var patientFields = document.getElementById('patientFields');
                                    var staffFields = document.getElementById('staffFields');

                                    // Hide all role-specific fields and disable their inputs
                                    hideAndDisableFields(doctorFields);
                                    hideAndDisableFields(patientFields);
                                    hideAndDisableFields(staffFields);

                                    // Show and enable fields based on selected role
                                    if (role === 'doctor') {
                                        showAndEnableFields(doctorFields);
                                    } else if (role === 'patient') {
                                        showAndEnableFields(patientFields);
                                    } else if (role === 'staff') {
                                        showAndEnableFields(staffFields);
                                    }
                                }

                                function hideAndDisableFields(container) {
                                    container.style.display = 'none';
                                    var inputs = container.querySelectorAll('input, select, textarea');
                                    inputs.forEach(function (input) {
                                        input.disabled = true;
                                    });
                                }

                                function showAndEnableFields(container) {
                                    container.style.display = 'block';
                                    var inputs = container.querySelectorAll('input, select, textarea');
                                    inputs.forEach(function (input) {
                                        input.disabled = false;
                                    });
                                }

                                document.addEventListener('DOMContentLoaded', function () {
                                    // Show role fields if there's an old value (after validation error)
                                    toggleRoleFields();
                                });
                            </script>

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