<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
