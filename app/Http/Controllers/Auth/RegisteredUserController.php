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
        // Log the incoming request data for debugging
        \Log::info('Registration attempt', [
            'role' => $request->role,
            'all_data' => $request->all()
        ]);

        // Base validation rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|in:admin,doctor,staff,patient',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'nullable|string',
        ];

        // Add role-specific validation rules
        switch ($request->role) {
            case 'doctor':
                $rules['specialization'] = 'required|string|max:255';
                $rules['department'] = 'required|string|max:255';
                $rules['experience'] = 'nullable|string|max:50';
                break;
            case 'staff':
                $rules['staff_role'] = 'required|string|max:255';
                $rules['assigned_room'] = 'nullable|string|max:255';
                break;
            case 'patient':
                $rules['blood_group'] = 'nullable|string|max:10';
                break;
        }

        try {
            $request->validate($rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed', [
                'errors' => $e->errors(),
                'rules' => $rules
            ]);
            throw $e;
        }

        // Create user
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Create profile based on role with extended data
        switch ($request->role) {
            case 'admin':
                Admin::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_id' => $user->id,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'dob' => $request->date_of_birth,
                    'gender' => $request->gender,
                ]);
                break;
            case 'doctor':
                // Calculate age from date of birth
                $age = null;
                if ($request->date_of_birth) {
                    $dob = new \DateTime($request->date_of_birth);
                    $now = new \DateTime();
                    $age = $now->diff($dob)->y;
                }
                
                Doctor::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_id' => $user->id,
                    'gender' => $request->gender,
                    'age' => $age,
                    'phone' => $request->phone,
                    'specialization' => $request->specialization,
                    'experience' => $request->experience,
                    'department' => $request->department,
                    'dob' => $request->date_of_birth,
                    'address' => $request->address,
                ]);
                break;
            case 'staff':
                Staff::create([
                    'name' => $user->name,
                    'user_id' => $user->id,
                    'phone' => $request->phone,
                    'assigned_room' => $request->assigned_room,
                    'role' => $request->staff_role, // Using existing role column for staff role
                    'staff_role' => $request->staff_role, // Also set new staff_role column if it exists
                    'email' => $request->email,
                    'dob' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'address' => $request->address,
                ]);
                break;
            case 'patient':
                Patient::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_id' => $user->id,
                    'dob' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'blood_group' => $request->blood_group,
                    'registration_date' => now()->toDateString(),
                ]);
                break;
        }

        // After registration, redirect to login page
        return redirect('/login')->with('success', 'Account created successfully! Please log in.');
    }
}
