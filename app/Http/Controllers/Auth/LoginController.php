<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // If user is already logged in, redirect to their dashboard
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        
        return view('authPages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            // Redirect to role-based dashboard using helper method
            return $this->redirectBasedOnRole($user);
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Helper method to redirect user based on their role
     */
    private function redirectBasedOnRole($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect('/admin')->with('success', 'Welcome Admin!');
            case 'doctor':
                return redirect('/doctor')->with('success', 'Welcome Doctor!');
            case 'staff':
                return redirect('/staff')->with('success', 'Welcome Staff!');
            case 'patient':
                return redirect('/patient')->with('success', 'Welcome Patient!');
            default:
                return redirect('/')->with('error', 'Invalid user role.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        // Clear all session data to ensure security
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
