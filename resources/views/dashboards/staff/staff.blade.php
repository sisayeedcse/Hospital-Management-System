@php
$tasks = [
    ["id" => 101, "task" => "Check Ward 3 room 209 patient at 3 am", "priority" => "High", "deadline" => "Today"],
    ["id" => 102, "task" => "Review patient records of room 205", "priority" => "Medium", "deadline" => "Today"],
    ["id" => 103, "task" => "Prepare Medication for Mr.Smith", "priority" => "High", "deadline" => "Today"],
    ["id" => 104, "task" => "Check vital signs of room 205", "priority" => "Medium", "deadline" => "Today"],
    ["id" => 105, "task" => "Update Patient records", "priority" => "Low", "deadline" => "Tomorrow"],
    ["id" => 106, "task" => "Clean Room 110", "priority" => "Medium", "deadline" => "Tomorrow"],
];
$upcomingTasks = [
    ["id" => 101, "task" => "Prepare Medication for Mr.Smith", "deadline" => "Today"],
    ["id" => 102, "task" => "Check vital signs of room 205", "deadline" => "Today"],
    ["id" => 103, "task" => "Update Patient records", "deadline" => "Tomorrow"],
    ["id" => 104, "task" => "Clean Room 110", "deadline" => "Tomorrow"],
];
$shifts = [
    ["date" => "01-09-2025", "shift" => "Day", "time" => "02.00 PM - 08.00 PM"],
    ["date" => "02-09-2025", "shift" => "Morning", "time" => "02.00 PM - 08.00 PM"],
    ["date" => "03-09-2025", "shift" => "Day", "time" => "02.00 PM - 10.00 PM"],
    ["date" => "04-09-2025", "shift" => "Morning", "time" => "02.00 PM - 08.00 PM"],
    ["date" => "05-09-2025", "shift" => "Night", "time" => "10.00 PM - 06.00 AM"],
];
$shiftIcons = [
    'Morning' => '<svg width="64" height="64" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="12" fill="#FFD600"/><ellipse cx="30" cy="30" rx="8" ry="3" fill="#B3E5FC"/><rect x="10" y="32" width="20" height="3" rx="1.5" fill="#B3E5FC"/></svg>',
    'Day' => '<svg width="64" height="64" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="12" fill="#FFD600"/></svg>',
    'Night' => '<svg width="64" height="64" viewBox="0 0 40 40" fill="none"><path d="M28 32c-7 0-12-5-12-12 0-4 2-8 6-10-2 2-3 5-3 8 0 7 5 12 12 12-1 1-2 2-3 2z" fill="#90CAF9"/><circle cx="28" cy="28" r="7" fill="#263238"/></svg>',
];
$assignedShift = 'Morning';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard | HospitalMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/Styles/staff.css') }}">
</head>
<body>
<div class="d-flex">
    <nav class="sidebar">
        <div class="sidebar-header">
            <span>{!! $shiftIcons['Day'] !!}</span>
            <span>HospitalMS</span>
        </div>
        <ul class="nav flex-column sidebar-menu mt-3">
            <li class="nav-item">
                <a href="#" class="nav-link active active-pill" id="btn-dashboard">
                    <span class="sidebar-icon"><i class="fas fa-home"></i></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" id="btn-tasks">
                    <span class="sidebar-icon"><i class="far fa-calendar"></i></span>
                    <span>Task Allocation</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" id="btn-shift">
                    <span class="sidebar-icon"><i class="far fa-clock"></i></span>
                    <span>Shift</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" id="btn-settings">
                    <span class="sidebar-icon"><i class="fas fa-cog"></i></span>
                    <span>Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" id="btn-logout">
                    <span class="sidebar-icon"><i class="fas fa-power-off"></i></span>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="main-content">
        <header class="header-bar">
            <div class="round-search position-relative">
                <span class="search-icon position-absolute">
                    <svg width="18" height="18" viewBox="0 0 18 18"><circle cx="8" cy="8" r="7" stroke="#bfc5ce" stroke-width="2" fill="none"/><line x1="13" y1="13" x2="17" y2="17" stroke="#bfc5ce" stroke-width="2"/></svg>
                </span>
                <input type="text" class="form-control ps-5" placeholder="Search">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqZ2eRaYapG3k6qtp9yCk6rfNQa2QOFriHIo1398PWnEskq-TlQXWYXwamEROS3uquXTA&usqp=CAU"
                    alt="Profile" class="avatar ms-3">
            </div>
        </header>
        <main class="content-panel">
            <section id="section-dashboard" class="fade-swap show">
                <div class="d-flex flex-row align-items-start mb-4 staff-dashboard-row">
                    <div class="flex-grow-1">
                        <h2 class="fw-bold mb-3 staff-dashboard-title">Dashboard</h2>
                        <div class="d-flex flex-row mb-4 staff-dashboard-cards-row">
                            <div class="content-card text-start flex-fill staff-dashboard-card">
                                <div class="fw-bold staff-dashboard-card-number">21</div>
                                <div class="mt-1 dashboard-label staff-dashboard-card-label">Tasks Today</div>
                            </div>
                            <div class="content-card text-start flex-fill staff-dashboard-card">
                                <div class="fw-bold staff-dashboard-card-shift">Morning</div>
                                <div class="mt-1 dashboard-label staff-dashboard-card-label">Current Shift</div>
                            </div>
                        </div>
                        <h4 class="fw-bold mt-4 mb-2 staff-dashboard-upcoming-title">Upcoming Tasks</h4>
                        <table class="table-plain w-100">
                            <thead>
                                <tr><th>ID</th><th>Tasks</th><th>Deadline</th></tr>
                            </thead>
                            <tbody>
                            @foreach ($upcomingTasks as $t)
                                <tr><td>{{ $t['id'] }}</td><td>{{ $t['task'] }}</td><td>{{ $t['deadline'] }}</td></tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="staff-dashboard-calendar-col mt-4">
                        <div class="content-card calendar-offwhite staff-dashboard-calendar-card">
                            <div class="fw-bold mb-2 staff-dashboard-calendar-title">Today's Shift</div>
                            <div class="calendar staff-dashboard-calendar">
                                <div class="d-flex justify-content-between align-items-center mb-3 staff-dashboard-calendar-header">
                                    <span class="fw-bold" id="calendar-month-label">August 2025</span>
                                    <span class="calendar-nav-group d-flex align-items-center staff-dashboard-calendar-nav">
                                        <button id="calendar-up-btn" class="btn btn-sm btn-light ms-2 staff-dashboard-calendar-btn"><span class="staff-dashboard-calendar-btn-icon">&#9650;</span></button>
                                        <button id="calendar-down-btn" class="btn btn-sm btn-light ms-1 staff-dashboard-calendar-btn"><span class="staff-dashboard-calendar-btn-icon">&#9660;</span></button>
                                    </span>
                                </div>
                                <table class="w-100" id="calendar-table">
                                    <thead>
                                        <tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
                                    </thead>
                                    <tbody id="calendar-body">
                                        <!-- Calendar days will be rendered here by JS -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-tasks" class="fade-swap" style="display:none;">
                <h2 class="fw-bold mb-2 staff-shift-title">Task Allocation</h2>
                <div class="mb-2 staff-shift-upcoming-label">Assigned Tasks</div>
                <table class="table-plain w-100" id="task-table">
                    <thead>
                        <tr><th>ID</th><th>Tasks</th><th>Priority</th><th>Deadline</th></tr>
                    </thead>
                    <tbody id="task-table-body">
                    @foreach ($tasks as $t)
                        <tr data-taskid="{{ $t['id'] }}"><td>{{ $t['id'] }}</td><td>{{ $t['task'] }}</td><td>{{ $t['priority'] }}</td><td>{{ $t['deadline'] }}</td></tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <h5 class="mb-3">Update Task</h5>
                    <div class="d-flex w-100 align-items-center gap-2">
                        <div class="flex-grow-1">
                            <select class="form-select task-select" id="task-dropdown">
                                <option value="">Select a task to complete</option>
                                @foreach ($tasks as $t)
                                    <option value="{{ $t['id'] }}">{{ $t['id'] }} – {{ $t['task'] }} ({{ $t['priority'] }})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary px-4" id="complete-task-btn" disabled>Complete</button>
                    </div>
                    <div id="no-tasks-msg" class="mt-3 text-muted" style="display:none;">No assigned tasks.</div>
                </div>
            </section>
            <section id="section-shift" class="fade-swap" style="display:none;">
                <div class="d-flex flex-row align-items-start mb-4 staff-shift-row">
                    <div class="flex-grow-1">
                        <h2 class="fw-bold mb-3 staff-shift-title">Shift Management</h2>
                        <div class="d-flex align-items-center mb-3 staff-shift-header">
                            <span class="staff-shift-sun">{!! $shiftIcons[$assignedShift] !!}</span>
                            <div>
                                <div class="fw-bold staff-shift-label">{{ $assignedShift }} Shift</div>
                                <div class="staff-shift-time">08.00 AM - 02.00 PM</div>
                            </div>
                        </div>
                        <div class="fw-bold mb-2 staff-shift-upcoming-label">Upcoming Shifts</div>
                        <table class="table-plain w-100">
                            <thead>
                                <tr><th>Date</th><th>Shift</th><th>Time</th></tr>
                            </thead>
                            <tbody>
                            @foreach ($shifts as $s)
                                <tr><td>{{ $s['date'] }}</td><td>{{ $s['shift'] }}</td><td>{{ $s['time'] }}</td></tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex flex-column justify-content-start staff-shift-request-col">
                        <div class="content-card staff-shift-request-card">
                            <div class="fw-bold mb-2 staff-shift-request-title">Request Shift Change</div>
                            <div class="mb-3 staff-shift-request-date">
                                <label class="form-label mb-1">Date</label>
                                <select class="form-select" id="shift-date-dropdown">
                                    <option value="">Choose Date</option>
                                    @foreach ($shifts as $s)
                                        <option value="{{ $s['date'] }}">{{ $s['date'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 staff-shift-request-shift">
                                <label class="form-label mb-1">Shift</label>
                                <select class="form-select" id="shift-type-dropdown" disabled>
                                    <option value="">Choose Shift</option>
                                </select>
                            </div>
                            <button class="btn btn-primary w-100 staff-shift-request-btn" id="request-shift-btn" disabled>Request to Shift Change</button>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-settings" class="fade-swap" style="display:none;">
                <div class="settings-wrapper">
                    <div class="settings-header">
                        <h2>John Doe</h2>
                        <p>Edit Profile</p>
                    </div>

                        <form id="settings-form" class="settings-form" autocomplete="off">
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
                                        <label class="form-label">Type</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="fulltime" value="fulltime" checked>
                                            <label class="form-check-label" for="fulltime">Full Time</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="parttime" value="parttime">
                                            <label class="form-check-label" for="parttime">Part Time</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Department</label>
                                        <select class="form-select" name="department">
                                            <option value="">Select Department</option>
                                            <option value="nursing">Nursing</option>
                                            <option value="pharmacy">Pharmacy</option>
                                            <option value="laboratory">Laboratory</option>
                                            <option value="radiology">Radiology</option>
                                            <option value="physiotherapy">Physiotherapy</option>
                                            <option value="reception">Reception</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile</label>
                                        <input type="tel" class="form-control" name="mobile" placeholder="+880 - 1800000000">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="someone@gmail.com">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Enter Address">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-outline-secondary ms-2">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Save Success Notification -->
                <div class="notification success-notification" id="save-notification">
                    <div class="notification-content">
                        <i class="fas fa-check-circle"></i>
                        <span>Saved Successfully</span>
                    </div>
                </div>
            </section>

            <div id="logout-modal" class="modal-overlay" style="display:none;">
                <div class="modal-card">
                    <h4 class="fw-bold mb-3">Logout Confirmation</h4>
                    <p>Are you sure you want to logout?</p>
                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <button class="btn btn-primary" id="confirm-logout">Confirm</button>
                        <button class="btn btn-outline-secondary" id="cancel-logout">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="notification" data-notification>
                <div class="notification-content">
                    <i class="fas fa-check-circle"></i>
                    <span></span>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    window.shiftData = @json($shifts);
</script>
<script src="{{ asset('js/staff.js') }}"></script>
</body>
</html>
