<?php
$page = $_GET['page'] ?? 'dashboard';
$menu = [
    'dashboard' => ['Dashboard', 'fa-house'],
    'appointment' => ['Appointment', 'fa-calendar'],
    'report' => ['Report', 'fa-file-alt'],
    'timeschedule' => ['Time Schedule', 'fa-clock'],
    'settings' => ['Settings', 'fa-gear'],
    'addtips' => ['Add Health Tips', 'fa-plus'],
    'logout' => ['Logout', 'fa-right-from-bracket'],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard | HospitalMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/Styles/doctor.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        window.currentDoctorPage = "<?= $page ?>";
    </script>
    <script src="{{ asset('assets/Styles/doctor.js') }}"></script>
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
                    <?php foreach ($menu as $key => $item): ?>
                    <li class="nav-item">
                        <a href="?page=<?= $key ?>" class="nav-link<?= $page === $key ? ' active' : '' ?>">
                            <i class="fa-solid <?= $item[1] ?>"></i> <?= $item[0] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
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
                            <form id="profileImageForm" method="POST" action="{{ route('doctor.upload.profile.image') }}" enctype="multipart/form-data">
                                @csrf
                                <label for="profileImageInput" style="cursor:pointer;">
                                    <img src="{{ optional(\App\Models\Image::where('user_id', Auth::id())->where('role', 'doctor')->first())->image_path ? asset('storage/' . \App\Models\Image::where('user_id', Auth::id())->where('role', 'doctor')->first()->image_path) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU' }}" alt="Profile" class="rounded-circle" width="120" height="120">
                                </label>
                                <input type="file" id="profileImageInput" name="profile_image" accept="image/*" style="display:none;" onchange="document.getElementById('profileImageForm').submit();">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Page Content -->
                <div class="content p-4">
                    <?php if ($page === 'dashboard'): ?>
                    <div class="dashboard-full">
                        <h4>Hi</h4>
                        <h2 class="doctor-name"><strong>Dr. {{ $doctor->name ?? Auth::user()->name }}</strong></h2>
                        <h4 class="welcome-note">Welcome To <span class="hospital-name">HospitalMS</span></h4>
                    </div>
                    <?php elseif ($page === 'appointment'): ?>
                    <!-- Empty appointment section - shows blank white page -->
                    <?php elseif ($page === 'report'): ?>
                    <h3>Dr. {{ $doctor->name ?? Auth::user()->name }}</h3>
                    <h4 class="mt-3 report-title"><span class="hospital-name">Reports</span></h4>

                    <div class="report-buttons mt-4 mb-4">
                        <button class="btn btn-primary report-btn me-3 mb-2" data-report="appointments">
                            <i class="fas fa-calendar-alt me-2"></i>Total Appointments
                        </button>
                        <button class="btn btn-success report-btn me-3 mb-2" data-report="patients">
                            <i class="fas fa-users me-2"></i>Total Patients
                        </button>
                        <button class="btn btn-warning report-btn me-3 mb-2" data-report="surgeries">
                            <i class="fas fa-procedures me-2"></i>Total Surgeries
                        </button>
                        <button class="btn btn-info report-btn me-3 mb-2" data-report="ratings">
                            <i class="fas fa-star me-2"></i>Overall Ratings
                        </button>
                    </div>

                    <div id="report-content" class="report-content" style="display: none;">
                        <div class="report-table-full">
                            <h5 id="report-title" class="mb-3"></h5>
                            <div id="report-table"></div>
                        </div>
                    </div>
                    <?php elseif ($page === 'timeschedule'): ?>
                    <h3>Dr. Jahidur Rahman</h3>
                    <h4 class="mt-3">Doctor Time Schedule</h4>

                    <div class="time-schedule-content mt-4">
                        <!-- Input Section -->
                        <div class="schedule-input-section mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Select Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="scheduleDate" required>
                                    </div>
                                    <div class="invalid-feedback" id="scheduleDateError"></div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Slot Duration <span class="text-danger">*</span></label>
                                    <select class="form-select" id="slotDuration" required>
                                        <option value="">Select Duration</option>
                                        <option value="10">10 minutes</option>
                                        <option value="15">15 minutes</option>
                                        <option value="20">20 minutes</option>
                                        <option value="25">25 minutes</option>
                                        <option value="30">30 minutes</option>
                                        <option value="35">35 minutes</option>
                                        <option value="40">40 minutes</option>
                                        <option value="45">45 minutes</option>
                                    </select>
                                    <div class="invalid-feedback" id="slotDurationError"></div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Start Time <span class="text-danger">*</span></label>
                                    <select class="form-select" id="startTime" required>
                                        <option value="">Select Start Time</option>
                                        <option value="06:00 AM">06:00 AM</option>
                                        <option value="06:30 AM">06:30 AM</option>
                                        <option value="07:00 AM">07:00 AM</option>
                                        <option value="07:30 AM">07:30 AM</option>
                                        <option value="08:00 AM">08:00 AM</option>
                                        <option value="08:30 AM">08:30 AM</option>
                                        <option value="09:00 AM">09:00 AM</option>
                                        <option value="09:30 AM">09:30 AM</option>
                                        <option value="10:00 AM">10:00 AM</option>
                                        <option value="10:30 AM">10:30 AM</option>
                                        <option value="11:00 AM">11:00 AM</option>
                                        <option value="11:30 AM">11:30 AM</option>
                                        <option value="12:00 PM">12:00 PM</option>
                                        <option value="12:30 PM">12:30 PM</option>
                                        <option value="01:00 PM">01:00 PM</option>
                                        <option value="01:30 PM">01:30 PM</option>
                                        <option value="02:00 PM">02:00 PM</option>
                                        <option value="02:30 PM">02:30 PM</option>
                                        <option value="03:00 PM">03:00 PM</option>
                                        <option value="03:30 PM">03:30 PM</option>
                                        <option value="04:00 PM">04:00 PM</option>
                                        <option value="04:30 PM">04:30 PM</option>
                                        <option value="05:00 PM">05:00 PM</option>
                                        <option value="05:30 PM">05:30 PM</option>
                                        <option value="06:00 PM">06:00 PM</option>
                                        <option value="06:30 PM">06:30 PM</option>
                                        <option value="07:00 PM">07:00 PM</option>
                                        <option value="07:30 PM">07:30 PM</option>
                                        <option value="08:00 PM">08:00 PM</option>
                                        <option value="08:30 PM">08:30 PM</option>
                                        <option value="09:00 PM">09:00 PM</option>
                                        <option value="09:30 PM">09:30 PM</option>
                                        <option value="10:00 PM">10:00 PM</option>
                                        <option value="10:30 PM">10:30 PM</option>
                                        <option value="11:00 PM">11:00 PM</option>
                                        <option value="11:30 PM">11:30 PM</option>
                                    </select>
                                    <div class="invalid-feedback" id="startTimeError"></div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">End Time <span class="text-danger">*</span></label>
                                    <select class="form-select" id="endTime" required>
                                        <option value="">Select End Time</option>
                                        <option value="06:00 AM">06:00 AM</option>
                                        <option value="06:30 AM">06:30 AM</option>
                                        <option value="07:00 AM">07:00 AM</option>
                                        <option value="07:30 AM">07:30 AM</option>
                                        <option value="08:00 AM">08:00 AM</option>
                                        <option value="08:30 AM">08:30 AM</option>
                                        <option value="09:00 AM">09:00 AM</option>
                                        <option value="09:30 AM">09:30 AM</option>
                                        <option value="10:00 AM">10:00 AM</option>
                                        <option value="10:30 AM">10:30 AM</option>
                                        <option value="11:00 AM">11:00 AM</option>
                                        <option value="11:30 AM">11:30 AM</option>
                                        <option value="12:00 PM">12:00 PM</option>
                                        <option value="12:30 PM">12:30 PM</option>
                                        <option value="01:00 PM">01:00 PM</option>
                                        <option value="01:30 PM">01:30 PM</option>
                                        <option value="02:00 PM">02:00 PM</option>
                                        <option value="02:30 PM">02:30 PM</option>
                                        <option value="03:00 PM">03:00 PM</option>
                                        <option value="03:30 PM">03:30 PM</option>
                                        <option value="04:00 PM">04:00 PM</option>
                                        <option value="04:30 PM">04:30 PM</option>
                                        <option value="05:00 PM">05:00 PM</option>
                                        <option value="05:30 PM">05:30 PM</option>
                                        <option value="06:00 PM">06:00 PM</option>
                                        <option value="06:30 PM">06:30 PM</option>
                                        <option value="07:00 PM">07:00 PM</option>
                                        <option value="07:30 PM">07:30 PM</option>
                                        <option value="08:00 PM">08:00 PM</option>
                                        <option value="08:30 PM">08:30 PM</option>
                                        <option value="09:00 PM">09:00 PM</option>
                                        <option value="09:30 PM">09:30 PM</option>
                                        <option value="10:00 PM">10:00 PM</option>
                                        <option value="10:30 PM">10:30 PM</option>
                                        <option value="11:00 PM">11:00 PM</option>
                                        <option value="11:30 PM">11:30 PM</option>
                                    </select>
                                    <div class="invalid-feedback" id="endTimeError"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary" onclick="saveSchedule()">Save
                                        Schedule</button>
                                </div>
                            </div>
                        </div>

                        <!-- Saved Schedule List -->
                        <div class="schedule-list-section">
                            <h5 class="mb-3">Saved Time Schedules</h5>
                            <div class="schedule-table-full">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Slot</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="scheduleTableBody">
                                            <!-- Sample data -->
                                            <tr>
                                                <td>15/09/2025</td>
                                                <td>06:00 PM</td>
                                                <td>10:00 PM</td>
                                                <td>15 minutes</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm me-2"
                                                        onclick="editSchedule(this)">Edit</button>
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="deleteSchedule(this)">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>16/09/2025</td>
                                                <td>07:00 PM</td>
                                                <td>09:00 PM</td>
                                                <td>10 minutes</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm me-2"
                                                        onclick="editSchedule(this)">Edit</button>
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="deleteSchedule(this)">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>17/09/2025</td>
                                                <td>04:00 PM</td>
                                                <td>08:00 PM</td>
                                                <td>20 minutes</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm me-2"
                                                        onclick="editSchedule(this)">Edit</button>
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="deleteSchedule(this)">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php elseif ($page === 'settings'): ?>
                    <div class="settings-full">
                        <h3>Dr. Jahidur Rahman</h3>
                        <h5 class="mt-3">Edit Profile</h5>
                        <form class="settings-form mt-4" id="settingsForm" method="POST" action="{{ route('doctor.update.settings') }}">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-3 text-center">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU"
                                        alt="Profile" class="settings-profile-pic mb-2" id="profileImage">
                                    <div>
                                        <input type="file" id="profileImageInput" accept="image/*"
                                            style="display: none;">
                                        <button type="button" class="btn btn-success btn-sm"
                                            id="profileImageUploadBtn">Upload</button>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="removeProfileImage()">Remove</button>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Type</label><br>
                                            <input type="radio" name="type" value="fulltime" checked> Full Time
                                            <input type="radio" name="type" value="parttime"> Part Time
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Full Name" value="{{ $doctor->name ?? Auth::user()->name }}">
                                            <div class="invalid-feedback" id="nameError"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Birth <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="dob" id="dob"
                                                value="{{ $doctor->dob ?? '' }}">
                                            <div class="invalid-feedback" id="dobError"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Department <span class="text-danger">*</span></label>
                                            <select class="form-select pe-5" name="department" id="department">
                                                <option value="">Select Department</option>
                                                <option value="Cardiology" {{ (isset($doctor) && $doctor->department == 'Cardiology') ? 'selected' : '' }}>Cardiology</option>
                                                <option value="Neurology" {{ (isset($doctor) && $doctor->department == 'Neurology') ? 'selected' : '' }}>Neurology</option>
                                                <option value="Pediatrics" {{ (isset($doctor) && $doctor->department == 'Pediatrics') ? 'selected' : '' }}>Pediatrics</option>
                                                <option value="Orthopedics" {{ (isset($doctor) && $doctor->department == 'Orthopedics') ? 'selected' : '' }}>Orthopedics</option>
                                                <option value="Dermatology" {{ (isset($doctor) && $doctor->department == 'Dermatology') ? 'selected' : '' }}>Dermatology</option>
                                                <option value="Dentistry" {{ (isset($doctor) && $doctor->department == 'Dentistry') ? 'selected' : '' }}>Dentistry</option>
                                                <option value="ENT" {{ (isset($doctor) && $doctor->department == 'ENT') ? 'selected' : '' }}>ENT (Ear, Nose & Throat)</option>
                                                <option value="General Medicine" {{ (isset($doctor) && $doctor->department == 'General Medicine') ? 'selected' : '' }}>General Medicine</option>
                                                <option value="Urology" {{ (isset($doctor) && $doctor->department == 'Urology') ? 'selected' : '' }}>Urology</option>
                                            </select>
                                            <div class="invalid-feedback" id="departmentError"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Gender</label>
                                            <select class="form-select" name="gender" id="gender">
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ (isset($doctor) && $doctor->gender == 'male') ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ (isset($doctor) && $doctor->gender == 'female') ? 'selected' : '' }}>Female</option>
                                                <option value="other" {{ (isset($doctor) && $doctor->gender == 'other') ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $doctor->phone ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Specialization</label>
                                            <input type="text" class="form-control" name="specialization" id="specialization" value="{{ $doctor->specialization ?? '' }}">
                                        </div>
                                            <label class="form-label">Specialization<span
                                                    class="text-danger">*</span></label>

                                            <select class="form-select pe-5" name="specialization" id="specialization">
                                                <option value="">Select Specialization</option>
                                                @if(isset($doctor) && $doctor->specialization)
                                                    <option value="{{ $doctor->specialization }}" selected>{{ $doctor->specialization }}</option>
                                                @endif
                                                <option value="Cardiologist">Cardiologist</option>
                                                <option value="Dermatologist">Dermatologist</option>
                                                <option value="Neurologist">Neurologist</option>
                                                <option value="Orthopedic">Orthopedic</option>
                                                <option value="Psychiatrist">Psychiatrist</option>
                                                <option value="Dentist">Dentist</option>
                                                <option value="General Physician">General Physician</option>
                                            </select>
                                            <div class="invalid-feedback" id="specializationError"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="someone@gmail.com" value="jahidur@hospital.com">
                                            <div class="invalid-feedback" id="emailError"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                                            <input type="gender" class="form-control" name="gender" id="gender"
                                                placeholder="" value="Male">
                                            <div class="invalid-feedback" id="genderError"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mobile" id="mobile"
                                                placeholder="+8801700000000" value="+8801700000000">
                                            <div class="invalid-feedback" id="mobileError"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="Enter Address"
                                                value="123 Medical Center, Dhaka, Bangladesh">
                                            <div class="invalid-feedback" id="addressError"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-outline-primary ms-2"
                                        onclick="resetForm()">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php elseif ($page === 'addtips'): ?>
                    <div class="addtips-full">
                        <h3>Dr. Jahidur Rahman</h3>
                        <h5 class="mt-3"><i class="fa fa-plus"></i> Add Health Tips</h5>
                        <form class="addtips-form mt-4" id="addtipsForm">
                            <div class="mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description" rows="4"
                                    placeholder="Write your health tips here (20-250 words)"></textarea>
                                <div class="word-count mt-2">
                                    <small class="text-muted">Word count: <span id="wordCount">0</span>/250</small>
                                </div>
                                <div class="invalid-feedback" id="descriptionError"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-outline-primary ms-2"
                                onclick="resetHealthTipsForm()">Cancel</button>
                        </form>
                    </div>
                    <?php elseif ($page === 'logout'): ?>
                    <script>
                        window.onload = function () {
                            document.getElementById('logoutModal').style.display = 'flex';
                        }
                    </script>
                    <div id="logoutModal" class="modal-overlay">
                        <div class="modal-box">
                            <h5>Logout Confirmation</h5>
                            <p>Are you sure you want to do logout?</p>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </form>
                            <button onclick="cancelLogout()" class="btn btn-outline-primary">Cancel</button>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    <div class="notification" id="saveNotification">
        <div class="notification-content">
            <i class="fas fa-check-circle"></i>
            <span>Saved Successfully</span>
        </div>
    </div>

    <script>
        function cancelLogout() {
            window.location.href = '?page=dashboard';
        }
    </script>

</body>

</html>