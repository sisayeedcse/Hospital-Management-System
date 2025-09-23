<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function dashboard()
    {
        // Make sure only admin can access this
        if (Auth::user()->role !== 'admin') {
            return redirect('/login')->with('error', 'Unauthorized access');
        }

        // Get data for admin dashboard
        $users = \App\Models\User::all();
        $doctors = \App\Models\Doctor::all();
        $patients = \App\Models\Patient::all();
        $staffs = \App\Models\Staff::all();

        return view('dashboards.admin.admin', compact('users', 'doctors', 'patients', 'staffs'));
    }
}