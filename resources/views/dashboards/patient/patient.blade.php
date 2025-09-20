
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="appointments-container">
                        <h3>Mr. {{ Auth::user()->name ?? 'Patient' }}</h3>
                        
                        <!-- Search and Book Section -->
                        <div class="appointment-search-section mt-4">
                            <h5 class="mb-3"><strong>Book New Appointment</strong></h5>
                            
                            <div class="search-form-container">
                                <form id="searchDoctorsForm" class="row g-3">
                                    <div class="col-md-4">
                                        <label for="department" class="form-label">Select Department</label>
                                        <select class="form-control" id="department" name="department" required>
                                            <option value="">Choose Department</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="appointmentDate" class="form-label">Preferred Date</label>
                                        <input type="date" class="form-control" id="appointmentDate" name="date" min="{{ date('Y-m-d') }}" required>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary search-btn">
                                            <i class="fa-solid fa-search"></i> Search Doctors
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Doctors Results -->
                        <div id="doctorsResults" class="doctors-results mt-4" style="display: none;">
                            <h5 class="mb-3"><strong>Available Doctors</strong></h5>
                            <div id="doctorsList" class="doctors-grid">
                                <!-- Doctors will be loaded here -->
                            </div>
                        </div>

                        <!-- Your Appointments Section -->
                        <div class="current-appointments mt-5">
                            <h5 class="mb-3"><strong>Your Appointments</strong></h5>
                            <div class="appointment-table-full">
                                <div class="row fw-bold mb-2 appointment-header-row">
                                    <div class="col-md-2">Doctor Name</div>
                                    <div class="col-md-2">Department</div>
                                    <div class="col-md-2">Date</div>
                                    <div class="col-md-2">Time</div>
                                    <div class="col-md-2">Status</div>
                                    <div class="col-md-2">Action</div>
                                </div>
                                
                                @if(isset($appointments) && $appointments->count() > 0)
                                    @foreach($appointments as $appointment)
                                        <div class="row align-items-center mb-2 appointment-row">
                                            <div class="col-md-2">{{ $appointment->doctor->name }}</div>
                                            <div class="col-md-2">{{ $appointment->specialization }}</div>
                                            <div class="col-md-2">{{ $appointment->date->format('M d, Y') }}</div>
                                            <div class="col-md-2">{{ $appointment->time }}</div>
                                            <div class="col-md-2">
                                                <span class="status-badge status-{{ strtolower($appointment->status) }}">
                                                    {{ $appointment->status }}
                                                </span>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-start gap-2">
                                                @if($appointment->status !== 'Completed' && $appointment->status !== 'Cancelled')
                                                    <button class="btn btn-warning btn-sm reschedule-btn" 
                                                            data-appointment-id="{{ $appointment->appointment_no }}"
                                                            data-doctor="{{ $appointment->doctor->name }}">
                                                        <i class="fa-solid fa-calendar-days"></i> Reschedule
                                                    </button>
                                                    <button class="btn btn-danger btn-sm cancel-btn" 
                                                            data-appointment-id="{{ $appointment->appointment_no }}">
                                                        <i class="fa-solid fa-times"></i> Cancel
                                                    </button>
                                                @else
                                                    <span class="text-muted">No actions</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-12 text-center py-4">
                                            <p class="text-muted">No appointments found. Book your first appointment above!</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Reschedule Modal -->
                    <div class="modal fade" id="rescheduleModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Reschedule Appointment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="rescheduleForm">
                                        <input type="hidden" id="rescheduleAppointmentId" name="appointment_id">
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Doctor</label>
                                            <input type="text" class="form-control" id="rescheduleDoctorName" readonly>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">New Date</label>
                                            <input type="date" class="form-control" id="rescheduleDate" name="new_date" min="{{ date('Y-m-d') }}" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="confirmReschedule">Reschedule</button>
                                </div>
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline;">
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

<!-- JavaScript for Appointment Functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load departments on page load
    loadDepartments();
    
    // Search doctors form submission
    document.getElementById('searchDoctorsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        searchDoctors();
    });
    
    // Event listeners for appointment actions
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('book-appointment-btn')) {
            bookAppointment(e.target);
        } else if (e.target.classList.contains('cancel-btn')) {
            cancelAppointment(e.target.dataset.appointmentId);
        } else if (e.target.classList.contains('reschedule-btn')) {
            openRescheduleModal(e.target);
        }
    });
    
    // Reschedule confirmation
    document.getElementById('confirmReschedule').addEventListener('click', function() {
        rescheduleAppointment();
    });
});

// Load departments into dropdown
function loadDepartments() {
    fetch('/patient/departments')
        .then(response => response.json())
        .then(departments => {
            const select = document.getElementById('department');
            departments.forEach(dept => {
                const option = document.createElement('option');
                option.value = dept;
                option.textContent = dept;
                select.appendChild(option);
            });
        })
        .catch(error => console.error('Error loading departments:', error));
}

// Search doctors by department
function searchDoctors() {
    const formData = new FormData(document.getElementById('searchDoctorsForm'));
    
    fetch('/patient/search-doctors', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        displayDoctors(data.doctors);
    })
    .catch(error => console.error('Error searching doctors:', error));
}

// Display doctors in cards
function displayDoctors(doctors) {
    const resultsDiv = document.getElementById('doctorsResults');
    const doctorsList = document.getElementById('doctorsList');
    
    if (doctors.length === 0) {
        doctorsList.innerHTML = '<div class="col-12 text-center py-4"><p class="text-muted">No doctors found for the selected department.</p></div>';
    } else {
        doctorsList.innerHTML = '';
        doctors.forEach(doctor => {
            const doctorCard = createDoctorCard(doctor);
            doctorsList.appendChild(doctorCard);
        });
    }
    
    resultsDiv.style.display = 'block';
}

// Create doctor card
function createDoctorCard(doctor) {
    const col = document.createElement('div');
    col.className = 'col-md-6 col-lg-4 mb-3';
    
    col.innerHTML = `
        <div class="doctor-card">
            <div class="doctor-info">
                <h6 class="doctor-name">${doctor.name}</h6>
                <p class="doctor-specialization">${doctor.specialization}</p>
                <p class="doctor-experience">${doctor.experience} years experience</p>
                <p class="doctor-phone">${doctor.phone}</p>
            </div>
            <div class="doctor-actions">
                <button class="btn btn-primary btn-sm book-appointment-btn" 
                        data-doctor-id="${doctor.doctor_id}" 
                        data-doctor-name="${doctor.name}"
                        data-specialization="${doctor.specialization}">
                    <i class="fa-solid fa-calendar-plus"></i> Appointment
                </button>
            </div>
        </div>
    `;
    
    return col;
}

// Book appointment directly
function bookAppointment(button) {
    const doctorId = button.dataset.doctorId;
    const doctorName = button.dataset.doctorName;
    const specialization = button.dataset.specialization;
    const date = document.getElementById('appointmentDate').value;
    
    if (!date) {
        alert('Please select a date first!');
        return;
    }
    
    if (confirm(`Book appointment with ${doctorName} on ${date}?`)) {
        const formData = new FormData();
        formData.append('doctor_id', doctorId);
        formData.append('date', date);
        formData.append('specialization', specialization);
        
        fetch('/patient/book-appointment', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Appointment booked successfully!');
                location.reload();
            } else {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error booking appointment:', error);
            alert('An error occurred while booking the appointment.');
        });
    }
}

// Cancel appointment
function cancelAppointment(appointmentId) {
    if (confirm('Are you sure you want to cancel this appointment?')) {
        fetch('/patient/cancel-appointment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                appointment_id: appointmentId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Appointment cancelled successfully!');
                location.reload();
            } else {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error cancelling appointment:', error);
            alert('An error occurred while cancelling the appointment.');
        });
    }
}

// Open reschedule modal
function openRescheduleModal(button) {
    const appointmentId = button.dataset.appointmentId;
    const doctorName = button.dataset.doctor;
    
    document.getElementById('rescheduleAppointmentId').value = appointmentId;
    document.getElementById('rescheduleDoctorName').value = doctorName;
    
    const modal = new bootstrap.Modal(document.getElementById('rescheduleModal'));
    modal.show();
}

// Reschedule appointment
function rescheduleAppointment() {
    const formData = new FormData(document.getElementById('rescheduleForm'));
    
    fetch('/patient/reschedule-appointment', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Appointment rescheduled successfully!');
            location.reload();
        } else {
            alert('Error: ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error rescheduling appointment:', error);
        alert('An error occurred while rescheduling the appointment.');
    });
}
</script>
</body>
</html>
















