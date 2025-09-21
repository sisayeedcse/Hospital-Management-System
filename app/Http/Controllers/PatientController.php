<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display the patient dashboard
     */
    public function dashboard()
    {
        // Make sure only patient can access this
        if (Auth::user()->role !== 'patient') {
            return redirect('/login')->with('error', 'Unauthorized access');
        }

        return view('dashboards.patient.patient');
    }
}