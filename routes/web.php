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

Route::get('/patient', function () {
    return view('dashboards.patient.patient');
});

use App\Http\Controllers\DashboardController;
Route::get('/admin', [DashboardController::class, 'adminDashboard']);

// Doctor Edit/Delete
Route::get('/admin/doctors/edit/{id}', [DashboardController::class, 'editDoctor']);
Route::post('/admin/doctors/edit/{id}', [DashboardController::class, 'updateDoctor']);
Route::post('/admin/doctors/delete/{id}', [DashboardController::class, 'deleteDoctor']);

// Patient Edit/Delete
Route::get('/admin/patients/edit/{id}', [DashboardController::class, 'editPatient']);
Route::post('/admin/patients/edit/{id}', [DashboardController::class, 'updatePatient']);
Route::post('/admin/patients/delete/{id}', [DashboardController::class, 'deletePatient']);

Route::get('/staff', function () {
    return view('dashboards.staff.staff');
});

