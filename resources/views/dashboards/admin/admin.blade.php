@php
    $page = request()->get('page', 'dashboard');
    $menu = [
        'dashboard' => ['Dashboard', 'fa-house'],
        'doctors' => ['Manage Doctors', 'fa-user-md'],
        'patients' => ['Manage Patients', 'fa-bed'],
        'staff' => ['Manage Staff', 'fa-users'],
        'appointments' => ['Appointments', 'fa-calendar-check'],
        'settings' => ['Settings', 'fa-gear'],
        'logout' => ['Logout', 'fa-right-from-bracket'],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard | HospitalMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/Styles/doctor.css') }}">
    <script>
        // Add form submission monitoring for settings
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM loaded, looking for settings form...');
            const settingsForm = document.querySelector('.settings-form');
            console.log('Settings form found:', settingsForm);

            if (settingsForm) {
                console.log('Adding event listener to settings form');
                settingsForm.addEventListener('submit', function (e) {
                    console.log('Settings form submitted');
                    console.log('Form action:', this.action);
                    console.log('Form method:', this.method);

                    // Log form data
                    const formData = new FormData(this);
                    console.log('Form data entries:');
                    for (let [key, value] of formData.entries()) {
                        console.log(key, value);
                    }

                    // Show loading state
                    const submitButton = this.querySelector('button[type="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
                        console.log('Submit button disabled and loading state applied');
                    }
                });
            } else {
                console.error('Settings form not found!');
            }
        });

        function testFormSubmission() {
            console.log('Testing form submission...');
            const form = document.querySelector('.settings-form');
            if (form) {
                console.log('Form found:', form);
                console.log('Form action:', form.action);
                console.log('Form method:', form.method);
                console.log('CSRF token:', document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'));

                // Check form validity
                if (form.checkValidity()) {
                    console.log('Form is valid');
                    alert('Form is properly configured and valid!');
                } else {
                    console.log('Form is invalid');
                    form.reportValidity();
                }
            } else {
                console.error('Form not found');
                alert('Settings form not found!');
            }
        } ntAdminPage = "{{ $page }}";
    </script>
    <style>
        /* Modal overlay for logout */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-box {
            background: #fff;
            border-radius: 12px;
            padding: 32px 24px;
            min-width: 320px;
            text-align: center;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.12);
        }

        .modal-box h5 {
            font-weight: bold;
            margin-bottom: 12px;
        }

        .modal-box button {
            min-width: 100px;
            margin: 0 8px;
        }

        /* Form modal styles */
        .form-modal {
            background: #fff;
            border-radius: 16px;
            padding: 32px;
            min-width: 500px;
            max-width: 90vw;
            max-height: 90vh;
            overflow-y: auto;
        }

        .success-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #10b981;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 9999;
            display: none;
            font-weight: 500;
        }

        .admin-name {
            color: #222;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="sidebar-header text-center py-3">
                    <a href="/" style="text-decoration:none;">
                        <h5 class="logo-text" style="border-right:2px solid #e5e7eb; padding-right: 10px;">
                            <i class="fa-solid fa-hospital"></i> HospitalMS
                        </h5>
                    </a>
                </div>
                <ul class="nav flex-column">
                    @foreach ($menu as $key => $item)
                        <li class="nav-item">
                            <a href="?page={{ $key }}" class="nav-link{{ $page === $key ? ' active' : '' }}">
                                <i class="fa-solid {{ $item[1] }}"></i> {{ $item[0] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content-area p-0" style="border-left:1px solid #e5e7eb;">
                <!-- Top bar -->
                <div class="topbar d-flex justify-content-end align-items-center p-3">
                    <div class="d-flex align-items-center">
                        <div class="search-box">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <div class="profile-pic text-center">
                            <form id="profileImageForm" method="POST" action="{{ route('admin.upload.profile.image') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="profileImageInput" style="cursor:pointer;">
                                    <img src="{{ optional(\App\Models\Image::where('user_id', Auth::id())->where('role', 'admin')->first())->image_path ? asset('storage/' . \App\Models\Image::where('user_id', Auth::id())->where('role', 'admin')->first()->image_path) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU' }}"
                                        alt="Profile" class="rounded-circle" width="120" height="120">
                                </label>
                                <input type="file" id="profileImageInput" name="profile_image" accept="image/*"
                                    style="display:none;"
                                    onchange="document.getElementById('profileImageForm').submit();">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Page Content -->
                <div class="content p-4">
                    @if ($page === 'dashboard')
                        <div class="dashboard-full">
                            <h4>Hi</h4>
                            <h2 class="admin-name"><strong>Admin {{ Auth::user()->name ?? 'Administrator' }}</strong></h2>
                            <h4 class="welcome-note">Welcome To <span class="hospital-name">HospitalMS</span></h4>

                            <!-- Admin Statistics -->
                            <div class="row mt-4">
                                <div class="col-md-3 mb-4">
                                    <div class="report-box report-apps">
                                        <div class="report-label">Total Doctors</div>
                                        <div class="report-value">{{ $doctors->count() }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="report-box report-patients">
                                        <div class="report-label">Total Patients</div>
                                        <div class="report-value">{{ $patients->count() }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="report-box report-surgeries">
                                        <div class="report-label">Total Staff</div>
                                        <div class="report-value">{{ $staffs->count() }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="report-box report-duty">
                                        <div class="report-label">Total Users</div>
                                        <div class="report-value">{{ $users->count() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif ($page === 'doctors')
                        <div class="doctors-management">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3>Manage Doctors</h3>
                                <button class="btn btn-primary" onclick="showAddDoctorModal()">
                                    <i class="fa fa-plus"></i> Add New Doctor
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Specialization</th>
                                            <th>Department</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->doctor_id }}</td>
                                                <td>{{ $doctor->name }}</td>
                                                <td>{{ $doctor->email }}</td>
                                                <td>{{ $doctor->specialization }}</td>
                                                <td>{{ $doctor->department }}</td>
                                                <td>{{ $doctor->phone }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary me-2"
                                                        onclick="editDoctor({{ $doctor->doctor_id }}, '{{ addslashes($doctor->name) }}', '{{ $doctor->email }}', '{{ $doctor->specialization }}', '{{ $doctor->department }}', '{{ $doctor->phone }}', '{{ $doctor->gender }}', '{{ $doctor->dob }}', '{{ addslashes($doctor->address) }}')">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="deleteDoctor({{ $doctor->doctor_id }})">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @elseif ($page === 'patients')
                        <div class="patients-management">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3>Manage Patients</h3>
                                <button class="btn btn-primary" onclick="showAddPatientModal()">
                                    <i class="fa fa-plus"></i> Add New Patient
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Blood Group</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->patient_id }}</td>
                                                <td>{{ $patient->name }}</td>
                                                <td>{{ $patient->email }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td>{{ $patient->phone }}</td>
                                                <td>{{ $patient->blood_group }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary me-2"
                                                        onclick="editPatient({{ $patient->patient_id }}, '{{ addslashes($patient->name) }}', '{{ $patient->email }}', '{{ $patient->gender }}', '{{ $patient->phone }}', '{{ $patient->blood_group }}', '{{ $patient->dob }}', '{{ addslashes($patient->address) }}')">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="deletePatient({{ $patient->patient_id }})">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @elseif ($page === 'staff')
                        <div class="staff-management">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3>Manage Staff</h3>
                                <button class="btn btn-primary" onclick="showAddStaffModal()">
                                    <i class="fa fa-plus"></i> Add New Staff
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($staffs as $staff)
                                            <tr>
                                                <td>{{ $staff->id }}</td>
                                                <td>{{ $staff->name }}</td>
                                                <td>{{ $staff->email }}</td>
                                                <td>{{ $staff->staff_role }}</td>
                                                <td>{{ $staff->phone }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary me-2"
                                                        onclick="editStaff({{ $staff->id }}, '{{ addslashes($staff->name) }}', '{{ $staff->email }}', '{{ $staff->staff_role }}', '{{ $staff->phone }}', '{{ $staff->gender }}', '{{ $staff->dob }}', '{{ addslashes($staff->address) }}')">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="deleteStaff({{ $staff->id }})">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @elseif ($page === 'appointments')
                        <div class="appointments-management">
                            <h3>Appointments Management</h3>
                            <div class="appointment-table-full mt-4">
                                <div class="row fw-bold mb-2 appointment-header-row">
                                    <div class="col-md-2">Patient Name</div>
                                    <div class="col-md-2">Doctor Name</div>
                                    <div class="col-md-2">Department</div>
                                    <div class="col-md-2">Date</div>
                                    <div class="col-md-2">Time</div>
                                    <div class="col-md-2">Status</div>
                                </div>
                                @if(isset($appointments) && $appointments->count() > 0)
                                    @foreach($appointments as $appointment)
                                        <div class="row align-items-center mb-2">
                                            <div class="col-md-2">{{ $appointment->patient->name ?? 'N/A' }}</div>
                                            <div class="col-md-2">{{ $appointment->doctor->name ?? 'N/A' }}</div>
                                            <div class="col-md-2">{{ $appointment->doctor->department ?? 'N/A' }}</div>
                                            <div class="col-md-2">{{ $appointment->date }}</div>
                                            <div class="col-md-2">{{ $appointment->time }}</div>
                                            <div class="col-md-2">
                                                <span
                                                    class="badge bg-{{ $appointment->status == 'approved' ? 'success' : ($appointment->status == 'rejected' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($appointment->status) }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-12 text-center py-4">
                                            <p class="text-muted">No appointments found.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    @elseif ($page === 'settings')
                        <div class="settings-full">
                            <h3>Admin Settings</h3>
                            <h5 class="mt-3">Edit Profile</h5>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fa fa-check-circle"></i> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fa fa-exclamation-triangle"></i> {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Profile Image Upload Form (separate from settings form) -->
                            <form id="settingsProfileImageForm" method="POST"
                                action="{{ route('admin.upload.profile.image') }}" enctype="multipart/form-data"
                                style="display: none;">
                                @csrf
                                <input type="file" id="settingsProfileImageInput" name="profile_image" accept="image/*"
                                    onchange="document.getElementById('settingsProfileImageForm').submit();">
                            </form>

                            <form class="settings-form mt-4" method="POST" action="{{ route('admin.update.settings') }}">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-3 text-center">
                                        <label for="settingsProfileImageInput" style="cursor:pointer;">
                                            <img src="{{ optional(\App\Models\Image::where('user_id', Auth::id())->where('role', 'admin')->first())->image_path ? asset('storage/' . \App\Models\Image::where('user_id', Auth::id())->where('role', 'admin')->first()->image_path) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU' }}"
                                                alt="Profile" class="settings-profile-pic mb-2">
                                        </label>
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="document.getElementById('settingsProfileImageInput').click()">Upload
                                                Photo</button>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $admin->name ?? Auth::user()->name }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $admin->email ?? Auth::user()->email }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ $admin->phone ?? '' }}" placeholder="Enter Phone Number">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" name="dob"
                                                    value="{{ $admin->dob ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select" name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="male" {{ (isset($admin) && $admin->gender == 'male') ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ (isset($admin) && $admin->gender == 'female') ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ (isset($admin) && $admin->gender == 'other') ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ $admin->address ?? '' }}" placeholder="Enter Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save
                                            Changes</button>
                                        <button type="button" class="btn btn-outline-primary ms-2"
                                            onclick="window.location.reload()">Cancel</button>
                                        <button type="button" class="btn btn-info ms-2" onclick="testFormSubmission()">Test
                                            Form</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    @elseif ($page === 'logout')
                        <!-- Logout modal -->
                        <script>
                            window.onload = function () {
                                document.getElementById('logoutModal').style.display = 'flex';
                            }
                        </script>
                        <div id="logoutModal" class="modal-overlay">
                            <div class="modal-box">
                                <h5>Logout Confirmation</h5>
                                <p>Are you sure you want to logout?</p>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </form>
                                <a href="?page=dashboard" class="btn btn-outline-primary">Cancel</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Success notification -->
    <div class="success-notification" id="successNotification">
        <i class="fa fa-check-circle"></i>
        <span>Operation completed successfully!</span>
    </div>

    <!-- Add/Edit Doctor Modal -->
    <div class="modal-overlay" id="doctorModal">
        <div class="form-modal">
            <h5 id="doctorModalTitle">Add New Doctor</h5>
            <form id="doctorForm">
                @csrf
                <input type="hidden" id="doctorId" name="doctor_id">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="doctorName" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="doctorEmail" name="email" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Specialization <span class="text-danger">*</span></label>
                        <select class="form-select" id="doctorSpecialization" name="specialization" required>
                            <option value="">Select Specialization</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Dermatologist">Dermatologist</option>
                            <option value="Neurologist">Neurologist</option>
                            <option value="Orthopedic">Orthopedic</option>
                            <option value="Psychiatrist">Psychiatrist</option>
                            <option value="Dentist">Dentist</option>
                            <option value="General Physician">General Physician</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Department <span class="text-danger">*</span></label>
                        <select class="form-select" id="doctorDepartment" name="department" required>
                            <option value="">Select Department</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Pediatrics">Pediatrics</option>
                            <option value="Orthopedics">Orthopedics</option>
                            <option value="Psychiatry">Psychiatry</option>
                            <option value="Dentistry">Dentistry</option>
                            <option value="General Medicine">General Medicine</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" id="doctorPhone" name="phone">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" id="doctorGender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="doctorDob" name="dob">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" id="doctorAddress" name="address">
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-primary me-2"
                        onclick="closeDoctorModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Doctor</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add/Edit Patient Modal -->
    <div class="modal-overlay" id="patientModal">
        <div class="form-modal">
            <h5 id="patientModalTitle">Add New Patient</h5>
            <form id="patientForm">
                @csrf
                <input type="hidden" id="patientId" name="patient_id">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="patientName" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="patientEmail" name="email" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" id="patientGender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" id="patientPhone" name="phone">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Blood Group</label>
                        <select class="form-select" id="patientBloodGroup" name="blood_group">
                            <option value="">Select Blood Group</option>
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
                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="patientDob" name="dob">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" id="patientAddress" name="address">
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-primary me-2"
                        onclick="closePatientModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Patient</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add/Edit Staff Modal -->
    <div class="modal-overlay" id="staffModal">
        <div class="form-modal">
            <h5 id="staffModalTitle">Add New Staff</h5>
            <form id="staffForm">
                @csrf
                <input type="hidden" id="staffId" name="staff_id">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="staffName" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="staffEmail" name="email" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Staff Role <span class="text-danger">*</span></label>
                        <select class="form-select" id="staffRole" name="staff_role" required>
                            <option value="">Select Role</option>
                            <option value="Nurse">Nurse</option>
                            <option value="Receptionist">Receptionist</option>
                            <option value="Lab Technician">Lab Technician</option>
                            <option value="Pharmacist">Pharmacist</option>
                            <option value="Cleaner">Cleaner</option>
                            <option value="Security">Security</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" id="staffPhone" name="phone">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" id="staffGender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="staffDob" name="dob">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" id="staffAddress" name="address">
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-primary me-2"
                        onclick="closeStaffModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Staff</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showAddDoctorModal() {
            document.getElementById('doctorModalTitle').innerText = 'Add New Doctor';
            document.getElementById('doctorForm').reset();
            document.getElementById('doctorId').value = '';
            document.getElementById('doctorModal').style.display = 'flex';
        }

        function editDoctor(id, name, email, specialization, department, phone, gender, dob, address) {
            document.getElementById('doctorModalTitle').innerText = 'Edit Doctor';
            document.getElementById('doctorId').value = id;
            document.getElementById('doctorName').value = name;
            document.getElementById('doctorEmail').value = email;
            document.getElementById('doctorSpecialization').value = specialization;
            document.getElementById('doctorDepartment').value = department;
            document.getElementById('doctorPhone').value = phone;
            document.getElementById('doctorGender').value = gender;
            document.getElementById('doctorDob').value = dob;
            document.getElementById('doctorAddress').value = address;
            document.getElementById('doctorModal').style.display = 'flex';
        }

        function closeDoctorModal() {
            document.getElementById('doctorModal').style.display = 'none';
        }

        function deleteDoctor(id) {
            if (confirm('Are you sure you want to delete this doctor? This action cannot be undone.')) {
                fetch('/admin/doctors/delete/' + id, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showSuccessNotification('Doctor deleted successfully!');
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        document.getElementById('doctorForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const doctorId = document.getElementById('doctorId').value;
            const url = doctorId ? '/admin/doctors/update/' + doctorId : '/admin/doctors/store';

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeDoctorModal();
                        showSuccessNotification(doctorId ? 'Doctor updated successfully!' : 'Doctor added successfully!');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        function showAddPatientModal() {
            document.getElementById('patientModalTitle').innerText = 'Add New Patient';
            document.getElementById('patientForm').reset();
            document.getElementById('patientId').value = '';
            document.getElementById('patientModal').style.display = 'flex';
        }

        function editPatient(id, name, email, gender, phone, blood_group, dob, address) {
            document.getElementById('patientModalTitle').innerText = 'Edit Patient';
            document.getElementById('patientId').value = id;
            document.getElementById('patientName').value = name;
            document.getElementById('patientEmail').value = email;
            document.getElementById('patientGender').value = gender;
            document.getElementById('patientPhone').value = phone;
            document.getElementById('patientBloodGroup').value = blood_group;
            document.getElementById('patientDob').value = dob;
            document.getElementById('patientAddress').value = address;
            document.getElementById('patientModal').style.display = 'flex';
        }

        function closePatientModal() {
            document.getElementById('patientModal').style.display = 'none';
        }

        function deletePatient(id) {
            if (confirm('Are you sure you want to delete this patient? This action cannot be undone.')) {
                fetch('/admin/patients/delete/' + id, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showSuccessNotification('Patient deleted successfully!');
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        document.getElementById('patientForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const patientId = document.getElementById('patientId').value;
            const url = patientId ? '/admin/patients/update/' + patientId : '/admin/patients/store';

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closePatientModal();
                        showSuccessNotification(patientId ? 'Patient updated successfully!' : 'Patient added successfully!');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        function showAddStaffModal() {
            document.getElementById('staffModalTitle').innerText = 'Add New Staff';
            document.getElementById('staffForm').reset();
            document.getElementById('staffId').value = '';
            document.getElementById('staffModal').style.display = 'flex';
        }

        function editStaff(id, name, email, role, phone, gender, dob, address) {
            document.getElementById('staffModalTitle').innerText = 'Edit Staff';
            document.getElementById('staffId').value = id;
            document.getElementById('staffName').value = name;
            document.getElementById('staffEmail').value = email;
            document.getElementById('staffRole').value = role;
            document.getElementById('staffPhone').value = phone;
            document.getElementById('staffGender').value = gender;
            document.getElementById('staffDob').value = dob;
            document.getElementById('staffAddress').value = address;
            document.getElementById('staffModal').style.display = 'flex';
        }

        function closeStaffModal() {
            document.getElementById('staffModal').style.display = 'none';
        }

        function deleteStaff(id) {
            if (confirm('Are you sure you want to delete this staff member? This action cannot be undone.')) {
                fetch('/admin/staff/delete/' + id, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showSuccessNotification('Staff deleted successfully!');
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        document.getElementById('staffForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const staffId = document.getElementById('staffId').value;
            const url = staffId ? '/admin/staff/update/' + staffId : '/admin/staff/store';

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeStaffModal();
                        showSuccessNotification(staffId ? 'Staff updated successfully!' : 'Staff added successfully!');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        function showSuccessNotification(message) {
            const notification = document.getElementById('successNotification');
            notification.querySelector('span').innerText = message;
            notification.style.display = 'flex';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }

        function cancelLogout() {
            window.location.href = '?page=dashboard';
        }

        // Add form submission monitoring for settings
        document.addEventListener('DOMContentLoaded', function () {
            const settingsForm = document.querySelector('.settings-form');
            if (settingsForm) {
                settingsForm.addEventListener('submit', function (e) {
                    console.log('Settings form submitted');
                    console.log('Form data:', new FormData(this));

                    // Show loading state
                    const submitButton = this.querySelector('button[type="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
                    }
                });
            }
        });
    </script>

</body>

</html>