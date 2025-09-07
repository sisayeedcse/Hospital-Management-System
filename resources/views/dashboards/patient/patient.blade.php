<?php
// Set which page to show
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
// Patient sidebar menu
$menu = [
    'dashboard' => ['Dashboard', 'fa-house'],
    'appointments' => ['My Appointments', 'fa-calendar-check'],
    'prescriptions' => ['Prescriptions', 'fa-file-medical'],
    'doctors' => ['Doctors', 'fa-user-md'],
    'feedback' => ['Feedback', 'fa-comment-dots'],
    'settings' => ['Settings', 'fa-gear'],
    'logout' => ['Logout', 'fa-right-from-bracket'],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard | HospitalMS</title>
    <link rel="stylesheet" href="{{ asset('assets/Styles/patient.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="sidebar-header text-center py-3">
                    <h5 class="logo-text" style="border-right:2px solid #e5e7eb; padding-right: 10px;"><i
                            class="fa-solid fa-hospital"></i> HospitalMS</h5>
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
            <div class="col-md-10 content-area p-0" style="border-left:1px solid #e5e7eb; min-height:100vh;">
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
                    <!-- Dashboard section -->
                    <div class="dashboard-full">
                        <h4>Hi</h4>
                        <h2 class="patient-name"><strong>Umme Hafsa</strong></h2>
                        <h4 class="welcome-note">Welcome To <span class="hospital-name">HospitalMS</span></h4>
                    </div>
                    <?php elseif ($page === 'appointments'): ?>
                    <!-- My Appointments section -->
                    <h3>My Appointments</h3>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Doctor</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2025-09-10</td>
                                <td>Dr. Jahidur Rahman</td>
                                <td>Confirmed</td>
                            </tr>
                            <tr>
                                <td>2025-09-15</td>
                                <td>Dr. Sayeed Ibne</td>
                                <td>Pending</td>
                            </tr>
                        </tbody>
                    </table>
                    <?php elseif ($page === 'prescriptions'): ?>
                    <!-- Prescriptions section -->
                    <h3>Prescriptions</h3>
                    <ul>
                        <li>2025-09-10: Paracetamol, Rest</li>
                        <li>2025-09-15: Inhaler, Exercise</li>
                    </ul>
                    <?php elseif ($page === 'doctors'): ?>
                    <!-- Doctors section -->
                    <h3>Doctors</h3>
                    <ul>
                        <li>Dr. Jahidur Rahman</li>
                        <li>Dr. Sayeed Ibne</li>
                    </ul>
                    <?php elseif ($page === 'feedback'): ?>
                    <!-- Feedback section -->
                    <h3>Feedback</h3>
                    <form class="mt-3">
                        <div class="mb-3">
                            <label class="form-label">Your Feedback</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php elseif ($page === 'settings'): ?>
                    <!-- Settings section -->
                    <div class="settings-full">
                        <h3>Patient Settings</h3>
                        <h5 class="mt-3">Edit Profile</h5>
                        <form class="settings-form mt-4">
                            <div class="row mb-4">
                                <div class="col-md-3 text-center">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU"
                                        alt="Profile" class="settings-profile-pic mb-2">
                                    <div>
                                        <button type="button" class="btn btn-success btn-sm">Upload</button>
                                        <button type="button" class="btn btn-danger btn-sm">Remove</button>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="patient@hospital.com">
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
                    <?php elseif ($page === 'logout'): ?>
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