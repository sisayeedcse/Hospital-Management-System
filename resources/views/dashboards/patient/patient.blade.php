<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/Styles/patient.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="logo"><i class="fa-solid fa-hospital"></i> HospitalMS</h2>
        <ul>
            <li onclick="showSection('dashboard')"><i class="fa-solid fa-house"></i> Dashboard</li>
            <li onclick="showSection('appointments')"><i class="fa-solid fa-calendar-check"></i> My Appointments</li>
            <li onclick="showSection('reports')"><i class="fa-solid fa-file-medical"></i> Medical Reports</li>
            <li onclick="showSection('prescriptions')"><i class="fa-solid fa-prescription"></i> Prescriptions</li>
            <li onclick="showSection('billing')"><i class="fa-solid fa-credit-card"></i> Billing & Payments</li>
            <li onclick="showSection('settings')"><i class="fa-solid fa-gear"></i> Settings</li>
            <li onclick="showSection('logout')"><i class="fa-solid fa-right-from-bracket"></i> Logout</li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <form class="search-form">
                <input type="text" class="search-input" placeholder="Search">
                <button type="submit" class="search-btn"><i class="fa-solid fa-search"></i></button>
            </form>
            <img src="{{ asset('patient_profile.jpg') }}" alt="Patient Profile" class="profile-img">
        </div>

        <!-- Dashboard -->
        <div id="dashboard" class="section">
            <div class="welcome-message">
                <h1>Hi, {{ $patientName ?? 'Shahin' }}</h1>
                <h3>Welcome to <span class="highlight">HospitalMS</span></h3>
            </div>
        </div>

        <!-- Appointments Section -->
        <div id="appointments" class="section" style="display: none;">
            <h3>List of Appointments</h3>
            <table class="appointment-table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Doctor Name</th>
                        <th>Specialization</th>
                        <th>Contact</th>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dr. Jahidur Rahman</td>
                        <td>Cardiologist</td>
                        <td>01700000000</td>
                        <td>20-Aug-2025</td>
                        <td>10:30 AM</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Dr. Jahidur Rahman</td>
                        <td>Cardiologist</td>
                        <td>01700000000</td>
                        <td>20-Aug-2025</td>
                        <td>10:30 AM</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Dr. Jahidur Rahman</td>
                        <td>Cardiologist</td>
                        <td>01700000000</td>
                        <td>20-Aug-2025</td>
                        <td>10:30 AM</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Dr. Jahidur Rahman</td>
                        <td>Cardiologist</td>
                        <td>01700000000</td>
                        <td>20-Aug-2025</td>
                        <td>10:30 AM</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Dr. Sayeed Ibne</td>
                        <td>Orthopedic</td>
                        <td>01800000000</td>
                        <td>21-Aug-2025</td>
                        <td>02:00 PM</td>
                        <td><span class="status confirmed">Confirmed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Medical Reports -->
        <div id="reports" class="section" style="display: none;">
            <h3>Medical Reports</h3>
            <div class="report-card">
                <h4>Chest X-Ray</h4>
                <p class="report-meta">Date: 20-Aug-2025 | Doctor: Dr. Jahidur Rahman</p>
                <div class="report-actions">
                    <button class="btn-download"><i class="fa-solid fa-download"></i> Download</button>
                    <button class="btn-print"><i class="fa-solid fa-print"></i> Print</button>
                </div>
            </div>
            <div class="report-card">
                <h4>Blood Test</h4>
                <p class="report-meta">Date: 21-Aug-2025 | Doctor: Dr. Sayeed Ibne</p>
                <div class="report-actions">
                    <button class="btn-download"><i class="fa-solid fa-download"></i> Download</button>
                    <button class="btn-print"><i class="fa-solid fa-print"></i> Print</button>
                </div>
            </div>

            <div class="report-card">
                <h4>Blood Test</h4>
                <p class="report-meta">Date: 21-Aug-2025 | Doctor: Dr. Sayeed Ibne</p>
                <div class="report-actions">
                    <button class="btn-download"><i class="fa-solid fa-download"></i> Download</button>
                    <button class="btn-print"><i class="fa-solid fa-print"></i> Print</button>
                </div>
            </div>

            <div class="report-card">
                <h4>Blood Test</h4>
                <p class="report-meta">Date: 21-Aug-2025 | Doctor: Dr. Sayeed Ibne</p>
                <div class="report-actions">
                    <button class="btn-download"><i class="fa-solid fa-download"></i> Download</button>
                    <button class="btn-print"><i class="fa-solid fa-print"></i> Print</button>
                </div>
            </div>
        </div>

        <!-- Prescriptions -->
        <div id="prescriptions" class="section" style="display: none;">
            <h3>Prescriptions</h3>
            <div class="prescription-card">
                <h4>Prescription by Dr. Jahidur Rahman</h4>
                <ul class="medicine-list">
                    <li>Aspirin 75mg - 1 tablet daily</li>
                    <li>Atorvastatin 10mg - 1 tablet at night</li>
                    <li>Vitamin D - Once a week</li>
                </ul>
            </div>
            <div class="prescription-card">
                <h4>Prescription by Dr. Sayeed Ibne</h4>
                <ul class="medicine-list">
                    <li>Calcium 500mg - After lunch</li>
                    <li>Diclofenac - If pain persists</li>
                </ul>
            </div>

            <div class="prescription-card">
                <h4>Prescription by Dr. Sayeed Ibne</h4>
                <ul class="medicine-list">
                    <li>Calcium 500mg - After lunch</li>
                    <li>Diclofenac - If pain persists</li>
                </ul>
            </div>
            <div class="prescription-card">
                <h4>Prescription by Dr. Sayeed Ibne</h4>
                <ul class="medicine-list">
                    <li>Calcium 500mg - After lunch</li>
                    <li>Diclofenac - If pain persists</li>
                </ul>
            </div>
        </div>

        <!-- Billing -->
        <div id="billing" class="section" style="display: none;">
            <h3>Billing & Payments</h3>
            <table class="appointment-table">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>

                    
                </thead>
                <tbody>
                    <tr>
                        <td>INV-001</td>
                        <td>৳2,750</td>
                        <td><span class="status confirmed">Paid</span></td>
                    </tr>
                    <tr>
                        <td>INV-002</td>
                        <td>৳1,500</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>INV-002</td>
                        <td>৳1,500</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>INV-002</td>
                        <td>৳1,500</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>INV-002</td>
                        <td>৳1,500</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Settings -->
        <div id="settings" class="section" style="display: none;">
            <h3>Settings</h3>
            <form class="settings-form">
                <label>Name:</label>
                <input type="text" placeholder="Update Name">
                <label>Email:</label>
                <input type="email" placeholder="Update Email">
                <label>Phone:</label>
                <input type="text" placeholder="Update Phone">
                <label>Password:</label>
                <input type="password" placeholder="New Password">
                <button type="submit" class="btn-accept">Save Changes</button>
            </form>
        </div>

        <!-- Logout -->
        <div id="logout" class="section" style="display: none;">
            <h3>Are you sure you want to logout?</h3>
            <button class="btn-decline">Cancel</button>
            <button class="btn-accept">Logout</button>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(sec => sec.style.display = 'none');
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>
