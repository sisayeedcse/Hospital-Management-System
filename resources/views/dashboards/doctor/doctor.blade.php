<?php
$page = $_GET['page'] ?? 'dashboard';
$menu = [
    'dashboard' => ['Dashboard', 'fa-house'],
    'appointment' => ['Appointment', 'fa-calendar'],
    'report' => ['Report', 'fa-file-alt'],
    'feedback' => ['Feedback', 'fa-comment-dots'],
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
                    <h5 class="logo-text" style="border-right:2px solid #e5e7eb; padding-right: 10px;">
                        <i class="fa-solid fa-hospital"></i> HospitalMS
                    </h5>
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
                        <div class="profile-pic">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU"
                                alt="Profile" class="rounded-circle">
                        </div>
                    </div>
                </div>
                <!-- Page Content -->
                <div class="content p-4">
                    <?php if ($page === 'dashboard'): ?>
                    <div class="dashboard-full">
                        <h4>Hi</h4>
                        <h2 class="doctor-name"><strong>Dr. Jahidur Rahman</strong></h2>
                        <h4 class="welcome-note">Welcome To <span class="hospital-name">HospitalMS</span></h4>
                    </div>
                    <?php elseif ($page === 'appointment'): ?>
                    <h3>Dr. Jahidur Rahman</h3>
                    
                    <!-- Appointment Tabs -->
                    <div class="appointment-tabs mt-4">
                        <div class="tab-navigation">
                            <button class="tab-btn active" data-tab="requests">
                                Requests
                            </button>
                            <button class="tab-btn" data-tab="accepted">
                                Accepted
                            </button>
                            <button class="tab-btn" data-tab="deleted">
                                Deleted
                            </button>
                        </div>
                        
                        <!-- Requests Tab Content -->
                        <div class="tab-content active" id="requests-tab">
                            <div class="appointment-table-full">
                                <div class="row fw-bold mb-2 appointment-header-row">
                                    <div class="col-3">Patient Name</div>
                                    <div class="col-3">Diagnosis</div>
                                    <div class="col-3">Contact Info</div>
                                    <div class="col-3">Action</div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">Umme Hafsa</div>
                                    <div class="col-3">Hypertension</div>
                                    <div class="col-3">01700000000</div>
                                    <div class="col-3 d-flex justify-content-start gap-2">
                                        <button class="btn btn-success btn-sm" onclick="acceptAppointment(this)">Accept</button>
                                        <button class="btn btn-danger btn-sm" onclick="declineAppointment(this)">Decline</button>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">Sayeed Ibne</div>
                                    <div class="col-3">Asthma</div>
                                    <div class="col-3">01700000000</div>
                                    <div class="col-3 d-flex justify-content-start gap-2">
                                        <button class="btn btn-success btn-sm" onclick="acceptAppointment(this)">Accept</button>
                                        <button class="btn btn-danger btn-sm" onclick="declineAppointment(this)">Decline</button>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">Umme Nadia</div>
                                    <div class="col-3">Fever</div>
                                    <div class="col-3">01700000000</div>
                                    <div class="col-3 d-flex justify-content-start gap-2">
                                        <button class="btn btn-success btn-sm" onclick="acceptAppointment(this)">Accept</button>
                                        <button class="btn btn-danger btn-sm" onclick="declineAppointment(this)">Decline</button>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">Sayeed Ibne</div>
                                    <div class="col-3">Typhoid</div>
                                    <div class="col-3">01700000000</div>
                                    <div class="col-3 d-flex justify-content-start gap-2">
                                        <button class="btn btn-success btn-sm" onclick="acceptAppointment(this)">Accept</button>
                                        <button class="btn btn-danger btn-sm" onclick="declineAppointment(this)">Decline</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Accepted Tab Content -->
                        <div class="tab-content" id="accepted-tab">
                            <div class="appointment-table-full">
                                <div class="row fw-bold mb-2 appointment-header-row">
                                    <div class="col-3">Patient Name</div>
                                    <div class="col-3">Diagnosis</div>
                                    <div class="col-3">Contact Info</div>
                                    <div class="col-3">Action</div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">Rahim Ahmed</div>
                                    <div class="col-3">Diabetes</div>
                                    <div class="col-3">01711111111</div>
                                    <div class="col-3 d-flex justify-content-start gap-2">
                                        <button class="btn btn-success btn-sm" onclick="doneAppointment(this)">Done</button>
                                        <button class="btn btn-danger btn-sm" onclick="cancelAppointment(this)">Cancel</button>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">Fatima Begum</div>
                                    <div class="col-3">Heart Disease</div>
                                    <div class="col-3">01722222222</div>
                                    <div class="col-3 d-flex justify-content-start gap-2">
                                        <button class="btn btn-success btn-sm" onclick="doneAppointment(this)">Done</button>
                                        <button class="btn btn-danger btn-sm" onclick="cancelAppointment(this)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Deleted Tab Content -->
                        <div class="tab-content" id="deleted-tab">
                            <div class="appointment-table-full">
                                <div class="row fw-bold mb-2 appointment-header-row">
                                    <div class="col-3">Patient Name</div>
                                    <div class="col-3">Diagnosis</div>
                                    <div class="col-3">Contact Info</div>
                                    <div class="col-3">Action</div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">Karim Uddin</div>
                                    <div class="col-3">Cold & Flu</div>
                                    <div class="col-3">01733333333</div>
                                    <div class="col-3 d-flex justify-content-start gap-2">
                                        <button class="btn btn-secondary btn-sm" onclick="revokeAppointment(this)">Revoke</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php elseif ($page === 'report'): ?>
                    <h3>Dr. Jahidur Rahman</h3>
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
                    <?php elseif ($page === 'feedback'): ?>
                    <h3>Dr. Jahidur Rahman</h3>
                    <h4 class="mt-3 report-title"><span class="hospital-name">Patient Ratings & Reviews</span></h4>
                    
                    <div class="ratings-content mt-4">
                        <div class="ratings-summary mb-4">
                            <h5>Average Rating: 4.5 ⭐</h5>
                            <p class="text-muted">Based on 4 patient reviews</p>
                        </div>
                        
                        <div class="ratings-table-full">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Rating</th>
                                            <th>Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Umme Hafsa</td>
                                            <td class="text-warning">⭐⭐⭐⭐⭐</td>
                                            <td>Great Service</td>
                                        </tr>
                                        <tr>
                                            <td>Sayeed Ibne</td>
                                            <td class="text-warning">⭐⭐⭐⭐⭐</td>
                                            <td>Well Mannered</td>
                                        </tr>
                                        <tr>
                                            <td>Rahim Ahmed</td>
                                            <td class="text-warning">⭐⭐⭐⭐</td>
                                            <td>Very professional and helpful</td>
                                        </tr>
                                        <tr>
                                            <td>Fatima Begum</td>
                                            <td class="text-warning">⭐⭐⭐⭐</td>
                                            <td>Good experience overall</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php elseif ($page === 'settings'): ?>
                    <div class="settings-full">
                        <h3>Dr. Jahidur Rahman</h3>
                        <h5 class="mt-3">Edit Profile</h5>
                        <form class="settings-form mt-4" id="settingsForm">
                            <div class="row mb-4">
                                <div class="col-md-3 text-center">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU"
                                        alt="Profile" class="settings-profile-pic mb-2" id="profileImage">
                                    <div>
                                        <input type="file" id="profileImageInput" accept="image/*" style="display: none;">
                                        <button type="button" class="btn btn-success btn-sm" id="profileImageUploadBtn">Upload</button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="removeProfileImage()">Remove</button>
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
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="Dr. Jahidur Rahman">
                                            <div class="invalid-feedback" id="nameError"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="dob" id="dob" value="1980-01-01">
                                            <div class="invalid-feedback" id="dobError"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                         <div class="col-md-6">
                                            <label class="form-label">Specialization <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="specialization" id="specialization" placeholder="Specialization" value="Cardiologist">
                                            <div class="invalid-feedback" id="specializationError"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="+8801700000000" value="+8801700000000">
                                            <div class="invalid-feedback" id="mobileError"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="someone@gmail.com" value="jahidur@hospital.com">
                                            <div class="invalid-feedback" id="emailError"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                                            <input type="gender" class="form-control" name="gender" id="gender" placeholder="" value="Male">
                                            <div class="invalid-feedback" id="genderError"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="123 Medical Center, Dhaka, Bangladesh">
                                            <div class="invalid-feedback" id="addressError"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-outline-primary ms-2" onclick="resetForm()">Cancel</button>
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
                                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Write your health tips here (20-250 words)"></textarea>
                                <div class="word-count mt-2">
                                    <small class="text-muted">Word count: <span id="wordCount">0</span>/250</small>
                                </div>
                                <div class="invalid-feedback" id="descriptionError"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-outline-primary ms-2" onclick="resetHealthTipsForm()">Cancel</button>
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
                            <button onclick="confirmLogout()" class="btn btn-primary">Confirm</button>
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

</body>

</html>