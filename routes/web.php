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

Route::get('/login', function () {
    return view('authPages.login');
});

Route::get('/register', function () {
    return view('authPages.register');
});


Route::get('/doctor/dashboard', function () {
    return view('dashboards.doctor.doctor');
});

Route::get('/patient', function () {
    return view('dashboards.patient.patient');
});

Route::get('/staff', function () {
    return view('dashboards.staff.staff');
});
