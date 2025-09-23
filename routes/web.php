<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Protected Dashboard Routes - Users can only access their own dashboard
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

Route::get('/doctor', [DoctorController::class, 'dashboard'])->middleware('role:doctor')->name('doctor.dashboard');
Route::post('/doctor/update-settings', [DoctorController::class, 'updateSettings'])->middleware('auth')->name('doctor.update.settings');
Route::post('/doctor/upload-profile-image', [DoctorController::class, 'uploadProfileImage'])->middleware('auth')->name('doctor.upload.profile.image');
Route::get('/patient', [PatientController::class, 'dashboard'])->middleware('role:patient')->name('patient.dashboard');
    Route::post('/patient/update-settings', [PatientController::class, 'updateSettings'])->middleware('auth')->name('patient.update.settings');
    Route::post('/patient/upload-profile-image', [PatientController::class, 'uploadProfileImage'])->middleware('auth')->name('patient.upload.profile.image');
Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('role:admin')->name('admin.dashboard');
Route::get('/staff', [StaffController::class, 'dashboard'])->middleware('role:staff')->name('staff.dashboard');