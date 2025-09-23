<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // If user is logged in, redirect to their dashboard
    if (Auth::check()) {
        $user = Auth::user();
        switch ($user->role) {
            case 'admin':
                return redirect('/admin');
            case 'doctor':
                return redirect('/doctor');
            case 'staff':
                return redirect('/staff');
            case 'patient':
                return redirect('/patient');
            default:
                return view('publicPages.home');
        }
    }
    return view('publicPages.home');
});

Route::get('/default', function () {
    return view('Default Layout.default');
});

// Additional public routes
Route::get('/about', function () {
    return view('publicPages.about');
});

Route::get('/services', function () {
    return view('publicPages.services');
});

Route::get('/contact', function () {
    return view('publicPages.contact');
});

use App\Http\Controllers\Auth\LoginController;
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\Auth\RegisteredUserController;
Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'register']);

// Protected Dashboard Routes - Users can only access their own dashboard
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

Route::get('/doctor', function () {
    return view('dashboards.doctor.doctor');
});

use App\Http\Controllers\PatientController;

Route::get('/patient', [PatientController::class, 'dashboard'])->name('patient.dashboard');
Route::post('/patient/search-doctors', [PatientController::class, 'searchDoctors'])->name('patient.search.doctors');
Route::post('/patient/doctor-slots', [PatientController::class, 'getDoctorSlots'])->name('patient.doctor.slots');
Route::post('/patient/book-appointment', [PatientController::class, 'bookAppointment'])->name('patient.book.appointment');
Route::post('/patient/cancel-appointment', [PatientController::class, 'cancelAppointment'])->name('patient.cancel.appointment');
Route::post('/patient/reschedule-appointment', [PatientController::class, 'rescheduleAppointment'])->name('patient.reschedule.appointment');
Route::get('/patient/departments', [PatientController::class, 'getDepartments'])->name('patient.departments');






// Patient Dashboard
Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');

// Departments
Route::get('/patient/departments', [PatientController::class, 'getDepartments']);

// Search doctors
Route::post('/patient/search-doctors', [PatientController::class, 'searchDoctors']);

// Book appointment
Route::post('/patient/book-appointment', [PatientController::class, 'bookAppointment']);

// Cancel appointment
Route::post('/patient/cancel-appointment', [PatientController::class, 'cancelAppointment']);

// Reschedule appointment
Route::post('/patient/reschedule-appointment', [PatientController::class, 'rescheduleAppointment']);
