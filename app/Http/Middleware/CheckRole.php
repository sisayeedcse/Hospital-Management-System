<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            // If not logged in, redirect to login page
            return redirect('/login')->with('error', 'Please login to access this page.');
        }

        // Get the current user
        $user = Auth::user();
        
        // Check if user has the required role
        if ($user->role !== $role) {
            // If user doesn't have correct role, redirect to their dashboard
            switch ($user->role) {
                case 'admin':
                    return redirect('/admin')->with('error', 'Access denied. You can only access your own dashboard.');
                case 'doctor':
                    return redirect('/doctor')->with('error', 'Access denied. You can only access your own dashboard.');
                case 'staff':
                    return redirect('/staff')->with('error', 'Access denied. You can only access your own dashboard.');
                case 'patient':
                    return redirect('/patient')->with('error', 'Access denied. You can only access your own dashboard.');
                default:
                    return redirect('/login')->with('error', 'Invalid user role.');
            }
        }

        // If user has correct role, continue to the requested page
        return $next($request);
    }
}