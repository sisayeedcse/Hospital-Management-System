<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Staff;
use App\Models\Patient;

class RegisteredUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('authPages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|in:admin,doctor,staff,patient',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Create profile based on role
        switch ($request->role) {
            case 'admin':
                Admin::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_id' => $user->id,
                ]);
                break;
            case 'doctor':
                Doctor::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_id' => $user->id,
                ]);
                break;
            case 'staff':
                Staff::create([
                    'name' => $user->name,
                    'user_id' => $user->id,
                ]);
                break;
            case 'patient':
                Patient::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_id' => $user->id,
                ]);
                break;
        }

        Auth::login($user);
        return redirect('/login');
    }
}
