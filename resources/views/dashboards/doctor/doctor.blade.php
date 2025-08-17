<?php
    // Determine which page to show
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
    // Sidebar menu items
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
    <style>
        /* Inline for modal overlay, will move to CSS file later */
        .modal-overlay { display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:1000; justify-content:center; align-items:center; }
        .modal-box { background:#fff; border-radius:12px; padding:32px 24px; min-width:320px; text-align:center; box-shadow:0 2px 16px rgba(0,0,0,0.12); }
        .modal-box h5 { font-weight:bold; margin-bottom:12px; }
        .modal-box button { min-width:100px; margin:0 8px; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-0">
            <div class="sidebar-header text-center py-3">
                <h5 class="logo-text" style="border-right:2px solid #e5e7eb; padding-right: 10px;"><i class="fa-solid fa-hospital"></i> HospitalMS</h5>
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
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU" alt="Profile" class="rounded-circle">
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
                    <h5 class="mt-3"><strong>List of Appointments</strong></h5>
                    <div class="appointment-table-full mt-4">
                        <div class="row fw-bold mb-2 appointment-header-row">
                            <div class="col-3">Patient name</div>
                            <div class="col-3">Diagnosis</div>
                            <div class="col-3">Contact Info</div>
                            <div class="col-3">Status</div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-3">1. Umme Hafsa</div>
                            <div class="col-3">Hypertension</div>
                            <div class="col-3">01700000000</div>
                            <div class="col-3 d-flex justify-content-start gap-2">
                                <button class="btn btn-success btn-sm">Accept</button>
                                <button class="btn btn-danger btn-sm">Decline</button>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-3">2. Sayeed Ibne</div>
                            <div class="col-3">Asthma</div>
                            <div class="col-3">01700000000</div>
                            <div class="col-3 d-flex justify-content-start gap-2">
                                <button class="btn btn-success btn-sm">Accept</button>
                                <button class="btn btn-danger btn-sm">Decline</button>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-3">3. Umme Nadia</div>
                            <div class="col-3">Fever</div>
                            <div class="col-3">01700000000</div>
                            <div class="col-3 d-flex justify-content-start gap-2">
                                <button class="btn btn-success btn-sm">Accept</button>
                                <button class="btn btn-danger btn-sm">Decline</button>
                            </div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-3">4. Sayeed Ibne</div>
                            <div class="col-3">Typhoid</div>
                            <div class="col-3">01700000000</div>
                            <div class="col-3 d-flex justify-content-start gap-2">
                                <button class="btn btn-success btn-sm">Accept</button>
                                <button class="btn btn-danger btn-sm">Decline</button>
                            </div>
                        </div>
                    </div>
                <?php elseif ($page === 'report'): ?>
                    <h3>Dr. Jahidur Rahman</h3>
                    <h4 class="mt-3 report-title"><span class="hospital-name">Reports</span></h4>
                    <div class="row report-boxes mt-4">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="report-box report-apps">
                                <div class="report-label">Total Appointments</div>
                                <div class="report-value">250+</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="report-box report-patients">
                                <div class="report-label">Total Patients</div>
                                <div class="report-value">150+</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="report-box report-surgeries">
                                <div class="report-label">Total Surgeries</div>
                                <div class="report-value">20+</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="report-box report-duty">
                                <div class="report-label">Total Duty</div>
                                <div class="report-value">250 Hr+</div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($page === 'feedback'): ?>
                    <h3>Dr. Jahidur Rahman</h3>
                    <div class="feedback-table-full mt-4">
                        <div class="row fw-bold mb-2 feedback-header-row">
                            <div class="col-4">Patient name</div>
                            <div class="col-4">Description</div>
                            <div class="col-4">Ratings</div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-4">1. Umme Hafsa</div>
                            <div class="col-4">Great Service</div>
                            <div class="col-4 text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-4">2. Sayeed Ibne</div>
                            <div class="col-4">Well Mannered</div>
                            <div class="col-4 text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-4">3. Umme Hafsa</div>
                            <div class="col-4">Good Service</div>
                            <div class="col-4 text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
                        </div>
                        <div class="row align-items-center mb-2">
                            <div class="col-4">4. Sayeed Ibne</div>
                            <div class="col-4">Well Explained</div>
                            <div class="col-4 text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
                        </div>
                    </div>
                <?php elseif ($page === 'settings'): ?>
                    <div class="settings-full">
                        <h3>Dr. Jahidur Rahman</h3>
                        <h5 class="mt-3">Edit Profile</h5>
                        <form class="settings-form mt-4">
                            <div class="row mb-4">
                                <div class="col-md-3 text-center">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU" alt="Profile" class="settings-profile-pic mb-2">
                                    <div>
                                        <button type="button" class="btn btn-success btn-sm">Upload</button>
                                        <button type="button" class="btn btn-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Type</label><br>
                                            <input type="radio" name="type" checked> Full Time
                                            <input type="radio" name="type"> Part Time
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Specialist</label>
                                            <input type="text" class="form-control" placeholder="Specialization">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" class="form-control" placeholder="+880 - 1800000000">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="someone@gmail.com">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="Enter Address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-outline-primary ms-2">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php elseif ($page === 'addtips'): ?>
                    <div class="addtips-full">
                        <h3>Dr. Jahidur Rahman</h3>
                        <h5 class="mt-3"><i class="fa fa-plus"></i> Add Health Tips</h5>
                        <form class="addtips-form mt-4">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-outline-primary ms-2">Cancel</button>
                        </form>
                    </div>
                <?php elseif ($page === 'logout'): ?>
                    <script>
                        window.onload = function() {
                            document.getElementById('logoutModal').style.display = 'flex';
                        }
                    </script>
                    <div id="logoutModal" class="modal-overlay">
                        <div class="modal-box">
                            <h5>Logout Confirmation</h5>
                            <p>Are you sure you want to do logout?</p>
                            <a href="login.php" class="btn btn-primary">Confirm</a>
                            <a href="?page=dashboard" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
