<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display the doctor dashboard
     */
    public function dashboard()
    {
        // Make sure only doctor can access this
        if (Auth::user()->role !== 'doctor') {
            return redirect('/login')->with('error', 'Unauthorized access');
        }

        return view('dashboards.doctor.doctor');
    }
}