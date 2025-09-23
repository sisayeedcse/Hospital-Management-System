<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display the staff dashboard
     */
    public function dashboard()
    {
        // Make sure only staff can access this
        if (Auth::user()->role !== 'staff') {
            return redirect('/login')->with('error', 'Unauthorized access');
        }

        return view('dashboards.staff.staff');
    }
}