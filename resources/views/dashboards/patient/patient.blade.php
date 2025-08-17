<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets\Styles\patient.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="sidebar">
        <h2 class="logo"><i class="fa-solid fa-hospital"></i> HospitalMS</h2>
        <ul>
            <li><i class="fa-solid fa-house"></i> Dashboard</li>
            <li><i class="fa-solid fa-calendar-check"></i> My Appointments</li>
            <li><i class="fa-solid fa-file-medical"></i> Medical Reports</li>
            <li><i class="fa-solid fa-prescription"></i> Prescriptions</li>
            <li><i class="fa-solid fa-credit-card"></i> Billing & Payments</li>
            <li><i class="fa-solid fa-gear"></i> Settings</li>
            <li><i class="fa-solid fa-right-from-bracket"></i> Logout</li>
        </ul>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <input type="text" placeholder="Search...">
            <img src="{{ asset('images/patient.png') }}" alt="Patient Profile" class="profile-img">
        </div>

        <div class="welcome-message">
            <h1>Hi, {{ $patientName ?? 'Patient' }}</h1>
            <h3>Welcome to <span class="highlight">HospitalMS</span></h3>
        </div>
    </div>
</body>

</html>