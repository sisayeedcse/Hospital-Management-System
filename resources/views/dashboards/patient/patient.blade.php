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
            <li onclick="showLogoutModal()"><i class="fa-solid fa-right-from-bracket"></i> Logout</li>
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

        <!-- Dashboard Section -->
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
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dr. Jahidur Rahman</td>
                        <td>Cardiologist</td>
                        <td>20-Aug-2025</td>
                        <td>10:30 AM</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>01700000000</td>
                        <td>
                            <button class="btn-accept">Accept</button>
                            <button class="btn-decline">Decline</button>
                            <button class="btn-reschedule">Reschedule</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dr. Sayeed Ibne</td>
                        <td>Orthopedic</td>
                        <td>21-Aug-2025</td>
                        <td>02:00 PM</td>
                        <td><span class="status confirmed">Confirmed</span></td>
                        <td>01800000000</td>
                        <td>
                            <button class="btn-accept">Accept</button>
                            <button class="btn-decline">Decline</button>
                            <button class="btn-reschedule">Reschedule</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Reports Section -->
        <div id="reports" class="section" style="display: none;">
            <h3>Medical Reports</h3>
            <!-- Patient Information -->
            <div class="report-card">
                <h4>Patient Information</h4>
                <table class="report-table">
                    <tr><th>Patient ID</th><td>PAT-1023</td></tr>
                    <tr><th>Name</th><td>Shahin Talukdar</td></tr>
                    <tr><th>Age</th><td>27</td></tr>
                    <tr><th>Gender</th><td>Male</td></tr>
                    <tr><th>Blood Group</th><td>O+</td></tr>
                </table>
            </div>

            <!-- Doctor Information -->
            <div class="report-card">
                <h4>Doctor Information</h4>
                <table class="report-table">
                    <tr><th>Doctor Name</th><td>Dr. Jahidur Rahman</td></tr>
                    <tr><th>Specialization</th><td>Cardiologist</td></tr>
                    <tr><th>Visit Date</th><td>15-Aug-2025</td></tr>
                </table>
            </div>

            <!-- Diagnosis -->
            <div class="report-card">
                <h4>Diagnosis</h4>
                <p>Patient is experiencing chest pain and shortness of breath. Possible angina. Further tests advised.</p>
            </div>

            <!-- Lab Test Results -->
            <div class="report-card">
                <h4>Lab Test Results</h4>
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Result</th>
                            <th>Reference Range</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Blood Sugar (Fasting)</td>
                            <td>115 mg/dl</td>
                            <td>70 - 110 mg/dl</td>
                        </tr>
                        <tr>
                            <td>Cholesterol</td>
                            <td>220 mg/dl</td>
                            <td>< 200 mg/dl</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Prescribed Medicines -->
            <div class="report-card">
                <h4>Prescribed Medicines</h4>
                <ul class="medicine-list">
                    <li>Aspirin 75mg – 1 tablet daily</li>
                    <li>Atorvastatin 10mg – 1 tablet at night</li>
                    <li>Metoprolol 25mg – 2 times daily</li>
                </ul>
            </div>

            <!-- Follow-up -->
            <div class="report-card">
                <h4>Follow-up</h4>
                <p>Next Appointment: <strong>30-Aug-2025</strong></p>
                <p>Special Advice: Low fat diet, regular walking, avoid smoking.</p>
            </div>

            <!-- Download/Print -->
            <div class="report-actions">
                <button class="btn-download"><i class="fa-solid fa-file-pdf"></i> Download PDF</button>
                <button class="btn-print"><i class="fa-solid fa-print"></i> Print Report</button>
            </div>
        </div>

        <!-- Prescriptions Section -->
        <div id="prescriptions" class="section" style="display: none;">
            <h3>Prescriptions</h3>
            <table class="prescription-table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Prescription ID</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Diagnosis</th>
                        <th>Medicines</th>
                        <th>Next Visit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>PRE-001</td>
                        <td>Dr. Jahidur Rahman</td>
                        <td>15-Aug-2025</td>
                        <td>Chest Pain, Angina</td>
                        <td>Aspirin 75mg (1x daily), Atorvastatin 10mg (1x night)</td>
                        <td>30-Aug-2025</td>
                        <td>
                            <button class="btn-view">View</button>
                            <button class="btn-download">Download</button>
                            <button class="btn-print">Print</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>PRE-002</td>
                        <td>Dr. Sayeed Ibne</td>
                        <td>10-Aug-2025</td>
                        <td>Joint Pain</td>
                        <td>Ibuprofen 400mg (2x daily), Calcium (1x daily)</td>
                        <td>25-Aug-2025</td>
                        <td>
                            <button class="btn-view">View</button>
                            <button class="btn-download">Download</button>
                            <button class="btn-print">Print</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Billing Section -->
        <div id="billing" class="section" style="display: none;">
            <h3>Billing & Payments</h3>
            <table class="billing-table">
                <thead>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Date</th>
                        <th>Service/Procedure</th>
                        <th>Doctor Charges</th>
                        <th>Lab Charges</th>
                        <th>Medicine Charges</th>
                        <th>Total Bill</th>
                        <th>Payment Status</th>
                        <th>Payment Method</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>INV-001</td>
                        <td>15-Aug-2025</td>
                        <td>Cardiology Consultation</td>
                        <td>৳1,500</td>
                        <td>৳800</td>
                        <td>৳450</td>
                        <td>৳2,750</td>
                        <td><span class="status paid">Paid</span></td>
                        <td>Mobile Banking</td>
                        <td>
                            <button class="btn-download">Download Invoice</button>
                            <button class="btn-print">Print Receipt</button>
                        </td>
                    </tr>
                    <tr>
                        <td>INV-002</td>
                        <td>10-Aug-2025</td>
                        <td>Orthopedic Consultation</td>
                        <td>৳1,200</td>
                        <td>৳0</td>
                        <td>৳300</td>
                        <td>৳1,500</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>-</td>
                        <td>
                            <button class="btn-pay">Pay Now</button>
                            <button class="btn-download">Download Invoice</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Settings Section -->
        <div id="settings" class="section" style="display: none;">
            <h3>Settings</h3>
            
            <!-- Profile Settings -->
            <div class="settings-card">
                <h4>Profile Settings</h4>
                <div class="setting-item">
                    <label>Name:</label>
                    <input type="text" value="Shahin Talukdar" class="setting-input">
                    <button class="btn-edit">Edit</button>
                </div>
                <div class="setting-item">
                    <label>Email:</label>
                    <input type="email" value="shahin@example.com" class="setting-input">
                    <button class="btn-edit">Edit</button>
                </div>
                <div class="setting-item">
                    <label>Phone Number:</label>
                    <input type="tel" value="01700000000" class="setting-input">
                    <button class="btn-edit">Edit</button>
                </div>
                <div class="setting-item">
                    <label>Gender:</label>
                    <select class="setting-select">
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="setting-item">
                    <label>Date of Birth:</label>
                    <input type="date" value="1998-01-01" class="setting-input">
                </div>
                <div class="setting-item">
                    <label>Address:</label>
                    <textarea class="setting-textarea">Chattogram, Bangladesh</textarea>
                    <button class="btn-edit">Edit</button>
                </div>
            </div>

            <!-- Account Settings -->
            <div class="settings-card">
                <h4>Account Settings</h4>
                <div class="setting-item">
                    <label>Change Username:</label>
                    <input type="text" value="shahin123" class="setting-input">
                    <button class="btn-update">Update</button>
                </div>
                <div class="setting-item">
                    <label>Change Password:</label>
                    <input type="password" placeholder="New Password" class="setting-input">
                    <button class="btn-update">Update</button>
                </div>
                
            </div>

            <!-- Medical Preferences -->
            <div class="settings-card">
                <h4>Medical Preferences</h4>
                <div class="setting-item">
                    <label>Preferred Doctor:</label>
                    <select class="setting-select">
                        <option value="">Select Doctor</option>
                        <option value="dr-jahidur">Dr. Jahidur Rahman</option>
                        <option value="dr-sayeed">Dr. Sayeed Ibne</option>
                    </select>
                </div>
                <div class="setting-item">
                    <label>Preferred Department:</label>
                    <select class="setting-select">
                        <option value="">Select Department</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="orthopedic">Orthopedic</option>
                        <option value="general">General Medicine</option>
                    </select>
                </div>
            </div>

            

            <!-- Privacy & Security -->
            <div class="settings-card">
                <h4>Privacy & Security</h4>
                <div class="setting-item">
                    <label>Who can view my reports:</label>
                    <select class="setting-select">
                        <option value="me">Only Me</option>
                        <option value="doctor" selected>My Doctor & Me</option>
                        <option value="family">Family Members</option>
                    </select>
                </div>
                <div class="setting-item">
                    <button class="btn-download">Download My Data</button>
                    <span class="setting-description">Export all your medical data</span>
                </div>
                <div class="setting-item">
                    <button class="btn-delete">Delete Account</button>
                    <span class="setting-description">Permanently delete your account</span>
                </div>
            </div>

            <!-- System Preferences -->
            <div class="settings-card">
                <h4>System Preferences</h4>
                <div class="setting-item">
                    <label>Language:</label>
                    <select class="setting-select">
                        <option value="en" selected>English</option>
                        <option value="bn">বাংলা</option>
                    </select>
                </div>
                <div class="setting-item">
                    <label>Theme:</label>
                    <select class="setting-select">
                        <option value="light" selected>Light Mode</option>
                        <option value="dark">Dark Mode</option>
                    </select>
                </div>
            </div>

            <div class="settings-actions">
                <button class="btn-save">Save All Changes</button>
                <button class="btn-cancel">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div id="logoutModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h4>Confirm Logout</h4>
            <p>Are you sure you want to log out?</p>
            <div class="modal-buttons">
                <button class="btn-confirm" onclick="confirmLogout()">Confirm</button>
                <button class="btn-cancel" onclick="hideLogoutModal()">Cancel</button>
            </div>
        </div>
    </div>

    <!-- JavaScript for Section Switching -->
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(function(section) {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }

        function showLogoutModal() {
            document.getElementById('logoutModal').style.display = 'flex';
        }

        function hideLogoutModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }

        function confirmLogout() {
            // Add logout functionality here
            alert('Logging out...');
            // Redirect to login page
            // window.location.href = '/login';
        }
    </script>
    </body>
</html>