<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('publicPages.home');
});

Route::get('/default', function () {
    return view('Default Layout.default');
});

// Additional routes for the navigation links
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

Route::get('/patient', function () {
    return view('dashboards.patient.patient');
});
Route::get('/patient', function () {
    return view('dashboards.patient.appintments');
});
Route::get('/patient', function () {
    return view('dashboards.patient.prescriptions');
});