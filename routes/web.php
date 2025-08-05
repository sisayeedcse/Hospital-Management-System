<?php

use Illuminate\Support\Facades\Route;

// Main landing page
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('publicPages.about');
});

Route::get('/services', function () {
    return view('publicPages.services');
});

Route::get('/contact', function () {
    return view('publicPages.contact');
});

// Authentication Routes (placeholders)
Route::get('/login', function () {
    return view('authPages.login');
})->name('login');

Route::get('/register', function () {
    return view('authPages.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('authPages.forgot');
})->name('forgot');

Route::post('/logout', function () {
    // Logout logic here
})->name('logout');

// Additional service routes (placeholders)
Route::get('/appointments', function () {
    return redirect('/')->with('info', 'Appointments feature coming soon!');
});

Route::get('/doctors', function () {
    return redirect('/')->with('info', 'Find Doctor feature coming soon!');
});

Route::get('/prescriptions', function () {
    return redirect('/')->with('info', 'Prescription management feature coming soon!');
});
