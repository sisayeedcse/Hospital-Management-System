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

// Patient Dashboard Sidebar Routes
Route::get('/patient/billing_payments', function () {
    return view('dashboards.patient.billing_payments');
})->name('patient.billing_payments');
Route::get('/patient/book_appointments', function () {
    return view('dashboards.patient.book_appointments');
})->name('patient.book_appointments');
Route::get('/patient/complaints', function () {
    return view('dashboards.patient.complaints');
})->name('patient.complaints');
Route::get('/patient/medical_history', function () {
    return view('dashboards.patient.medical_history');
})->name('patient.medical_history');
Route::get('/patient/my_prescriptions', function () {
    return view('dashboards.patient.my_prescriptions');
})->name('patient.my_prescriptions');
Route::get('/patient/profile_settings', function () {
    return view('dashboards.patient.profile_settings');
})->name('patient.profile_settings');
Route::get('/patient/view_reports', function () {
    return view('dashboards.patient.view_reports');
})->name('patient.view_reports');
Route::get('/patient', function () {
    return view('dashboards.patient.book_appintments');
});
Route::get('/patient', function () {
        return view('dashboards.patient.my_prescriptions');
});
Route::get('/patient', function () {
        return view('dashboards.patient.billing_payments');
});
Route::get('/patient', function () {
        return view('dashboards.patient.complaints');
});
Route::get('/patient', function () {
        return view('dashboards.patient.logout');
});
Route::get('/patient', function () {
        return view('dashboards.patient.medical_history');
});
Route::get('/patient', function () {
        return view('dashboards.patient.profile_settings');
});
Route::get('/patient', function () {
        return view('dashboards.patient.view_reports');
});

