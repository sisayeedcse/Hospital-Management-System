<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard | HospitalMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets\Styles\doctor.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-calendar"></i> Appointment</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-file-alt"></i> Report</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-comment-dots"></i> Feedback</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-gear"></i> Settings</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-plus"></i> Add Health Tips</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
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
                <h4>Hi</h4>
                <h3><strong>Dr. John Doe</strong></h3>
                <h5 class="mt-3">Welcome To <span class="hospital-name">HospitalMS</span></h5>
            </div>
        </div>
    </div>
</div>
</body>
</html>
