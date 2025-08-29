<?php
// Determine which page to show
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
// Sidebar menu items for admin
$menu = [
    'dashboard' => ['Dashboard', 'fa-house'],
    'users' => ['Manage Users', 'fa-users'],
    'doctors' => ['Doctors', 'fa-user-md'],
    'patients' => ['Patients', 'fa-bed'],
    'appointments' => ['Appointments', 'fa-calendar-check'],
    'rooms' => ['Rooms', 'fa-door-open'],
    'complaints' => ['Complaints', 'fa-exclamation-circle'],
    'feedbacks' => ['Feedbacks', 'fa-comments'],
    'settings' => ['Settings', 'fa-gear'],
    'logout' => ['Logout', 'fa-right-from-bracket'],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | HospitalMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/Styles/admin/admin.css') }}">
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
                    <!-- Dashboard section -->
                    <div class="dashboard-full">
                        <h4>Hello</h4>
                        <h2 class="admin-name"><strong>Admin</strong></h2>
                        <h4 class="welcome-note">Welcome To <span class="hospital-name">HospitalMS</span></h4>
                    </div>
                    <?php elseif ($page === 'users'): ?>
                    <!-- Manage Users section -->
                    <h3>Manage Users</h3>
                    <p>View, add, edit, or remove users.</p>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>Doctor</td>
                                <td><button class="btn btn-sm btn-primary">Edit</button> <button
                                        class="btn btn-sm btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>Patient</td>
                                <td><button class="btn btn-sm btn-primary">Edit</button> <button
                                        class="btn btn-sm btn-danger">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php elseif ($page === 'doctors'): ?>
                    <!-- Doctors section -->
                    <h3>Doctors</h3>
                    <p>List of all doctors.</p>
                    <ul>
                        <li>Dr. Jahidur Rahman</li>
                        <li>Dr. Sayeed Ibne</li>
                    </ul>
                    <?php elseif ($page === 'patients'): ?>
                    <!-- Patients section -->
                    <h3>Patients</h3>
                    <p>List of all patients.</p>
                    <ul>
                        <li>Umme Hafsa</li>
                        <li>Umme Nadia</li>
                    </ul>
                    <?php elseif ($page === 'appointments'): ?>
                    <!-- Appointments section -->
                    <h3>Appointments</h3>
                    <p>View and manage appointments.</p>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Umme Hafsa</td>
                                <td>Dr. Jahidur Rahman</td>
                                <td>2025-08-29</td>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <td>Umme Nadia</td>
                                <td>Dr. Sayeed Ibne</td>
                                <td>2025-08-30</td>
                                <td>Confirmed</td>
                            </tr>
                        </tbody>
                    </table>
                    <?php elseif ($page === 'rooms'): ?>
                    <!-- Rooms section -->
                    <h3>Rooms</h3>
                    <p>Manage hospital rooms.</p>
                    <ul>
                        <li>Room 101 - Available</li>
                        <li>Room 102 - Occupied</li>
                    </ul>
                    <?php elseif ($page === 'complaints'): ?>
                    <!-- Complaints section -->
                    <h3>Complaints</h3>
                    <p>View and resolve complaints.</p>
                    <ul>
                        <li>Complaint 1: Room not clean</li>
                        <li>Complaint 2: Delay in service</li>
                    </ul>
                    <?php elseif ($page === 'feedbacks'): ?>
                    <!-- Feedbacks section -->
                    <h3>Feedbacks</h3>
                    <p>See feedback from patients and staff.</p>
                    <ul>
                        <li>Great service!</li>
                        <li>Very helpful staff.</li>
                    </ul>
                    <?php elseif ($page === 'settings'): ?>
                    <!-- Settings section -->
                    <div class="settings-full">
                        <h3>Admin Settings</h3>
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
                                            <input type="email" class="form-control" placeholder="admin@hospital.com">
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