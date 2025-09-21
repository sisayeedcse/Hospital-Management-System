@php
    $section = request()->get('section', 'dashboard');

    $menu = [
        'dashboard' => ['Dashboard', 'fa-house'],
        'appointments' => ['Appointment', 'fa-calendar'],
        'feedback' => ['Feedback', 'fa-comment-dots'],
        'settings' => ['Settings', 'fa-gear'],
        'logout' => ['Logout', 'fa-right-from-bracket'],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard | HospitalMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/Styles/patient.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="sidebar-header text-center py-3">
                    <h5 class="logo-text">
                        <i class="fa-solid fa-hospital"></i> HospitalMS
                    </h5>
                </div>
                <ul class="nav flex-column">
                    @foreach ($menu as $key => $item)
                        <li class="nav-item">
                            <a href="?section={{ $key }}" class="nav-link{{ $section === $key ? ' active' : '' }}">
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
                        <div class="profile-pic">
                            <img src="/images/patient.jpg" alt="Profile" class="rounded-circle">
                        </div>
                    </div>
                </div>

                <!-- Page Content -->
                <div class="content p-4">
                    @if ($section === 'dashboard')
                        <div class="dashboard-full">
                            <h4>Hi</h4>
                            <h2 class="doctor-name"><strong>Mr. {{ Auth::user()->name ?? 'Patient' }}</strong></h2>
                            <h4 class="welcome-note">Welcome To <span class="hospital-name">HospitalMS</span></h4>
                        </div>

                    @elseif ($section === 'appointments')
                        <h3>Mr. {{ Auth::user()->name ?? 'Patient' }}</h3>
                        <h5 class="mt-3"><strong>Requested Appointments List</strong></h5>
                        <div class="appointment-table-full mt-4">
                            <div class="row fw-bold mb-2 appointment-header-row">
                                <div class="col-3">Doctor</div>
                                <div class="col-3">Date</div>
                                <div class="col-3">Status</div>
                                <div class="col-3">Action</div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-3">Dr. John Doe</div>
                                <div class="col-3">2025-09-12</div>
                                <div class="col-3">Pending</div>
                                <div class="col-3 d-flex justify-content-start gap-2">
                                    <button class="btn btn-success btn-sm">Cancel</button>
                                </div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-3">Dr. Jane Smith</div>
                                <div class="col-3">2025-09-15</div>
                                <div class="col-3">Confirmed</div>
                                <div class="col-3 d-flex justify-content-start gap-2">
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </div>
                            </div>
                        </div>

                    @elseif ($section === 'feedback')
                        <h3>Mr. {{ Auth::user()->name ?? 'Patient' }}</h3>
                        <div class="feedback-table-full mt-4">
                            <div class="row fw-bold mb-2 feedback-header-row">
                                <div class="col-4">Service</div>
                                <div class="col-4">Doctor</div>
                                <div class="col-4">Ratings</div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-4">General Checkup</div>
                                <div class="col-4">Dr. John Doe</div>
                                <div class="col-4 text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-4">Cardiology</div>
                                <div class="col-4">Dr. Jane Smith</div>
                                <div class="col-4 text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
                            </div>
                        </div>

                    @elseif ($section === 'settings')
                        <div class="settings-full">
                            <h3>Mr. {{ Auth::user()->name ?? 'Patient' }}</h3>
                            <h5>Edit Profile</h5>
                            <div class="text-center mb-4">
                                <img src="/images/patient.jpg" alt="Profile" class="settings-profile-pic mb-2">
                                <div class="mt-2">
                                    <button type="button" class="btn btn-success btn-sm">Upload</button>
                                    <button type="button" class="btn btn-danger btn-sm">Remove</button>
                                </div>
                            </div>
                            <form class="settings-form mt-4">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control" placeholder="+880 - 1800000000">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
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
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-outline-primary ms-2">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    @elseif ($section === 'logout')
                        <script>
                            window.onload = function () {
                                document.getElementById('logoutModal').style.display = 'flex';
                            }
                        </script>
                        <div id="logoutModal" class="logout-modal">
                            <div class="logout-modal-content">
                                <span class="logout-title">Logout Confirmation</span>
                                <span class="logout-msg">Are you sure you want to do logout?</span>
                                <div class="logout-btns">
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-confirm">Confirm</button>
                                    </form>
                                    <a href="?section=dashboard" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>