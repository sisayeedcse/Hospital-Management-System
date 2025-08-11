
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('views/dashboards/patient/patient.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Top Bar -->
    <nav class="navbar navbar-dark bg-primary px-4">
        <a class="navbar-brand font-weight-bold" href="#">Patient Dashboard</a>
        <span class="navbar-text text-white ml-auto">Welcome, {{ Auth::user()->name ?? 'Patient' }}</span>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 d-none d-md-block bg-light sidebar patient-sidebar">
                <div class="sidebar-sticky pt-4">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="{{ route('patient.billing_payments') }}">
                                <span class="fa fa-credit-card mr-2"></span> Billing & Payments
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="{{ route('patient.book_appointments') }}">
                                <span class="fa fa-calendar-plus mr-2"></span> Book Appointments
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="{{ route('patient.complaints') }}">
                                <span class="fa fa-exclamation-circle mr-2"></span> Complaints
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="{{ route('patient.medical_history') }}">
                                <span class="fa fa-notes-medical mr-2"></span> Medical History
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="{{ route('patient.my_prescriptions') }}">
                                <span class="fa fa-file-prescription mr-2"></span> My Prescriptions
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="{{ route('patient.profile_settings') }}">
                                <span class="fa fa-user-cog mr-2"></span> Profile Settings
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="{{ route('patient.view_reports') }}">
                                <span class="fa fa-file-alt mr-2"></span> View Reports
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-danger p-0">
                                    <span class="fa fa-sign-out-alt mr-2"></span> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-10 ml-sm-auto px-4 patient-main-content">
                <div class="pt-5">
                    <h2 class="font-weight-bold">Welcome to your dashboard</h2>
                    <p class="text-muted">Select an option from the sidebar to get started.</p>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
