<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\Appointment;
use App\Models\Image;

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
        $users = User::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        $staffs = Staff::all();
        $appointments = Appointment::with('patient', 'doctor')->get();
        
        // Get admin profile data
        $admin = Admin::where('user_id', Auth::id())->first();

        return view('dashboards.admin.admin', compact('users', 'doctors', 'patients', 'staffs', 'appointments', 'admin'));
    }

    /**
     * Update admin settings
     */
    public function updateSettings(Request $request)
    {
        try {
            // Add logging
            Log::info('Admin settings update attempt:', $request->all());
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . Auth::id(),
                'phone' => 'nullable|string|max:20',
                'dob' => 'nullable|date',
                'gender' => 'nullable|string|in:male,female,other',
                'address' => 'nullable|string|max:500',
            ]);

            // Update user table
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            Log::info('Current user ID:', ['user_id' => Auth::id()]);
            
            // Check if admin record exists
            $existingAdmin = Admin::where('user_id', Auth::id())->first();
            Log::info('Existing admin record:', ['admin' => $existingAdmin]);

            if ($existingAdmin) {
                // Update existing admin
                $existingAdmin->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'address' => $request->address,
                ]);
                $admin = $existingAdmin;
                Log::info('Updated existing admin record');
            } else {
                // Create new admin
                $admin = Admin::create([
                    'user_id' => Auth::id(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'address' => $request->address,
                ]);
                Log::info('Created new admin record');
            }

            Log::info('Admin record after update/create:', ['admin' => $admin]);

            Log::info('Admin settings updated successfully for user:', ['user_id' => Auth::id()]);
            
            return redirect()->back()->with('success', 'Settings updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in admin settings:', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating admin settings:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error updating settings: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Upload profile image
     */
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = 'admin_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
            
            // Store in storage/public/uploads
            $path = $image->storeAs('uploads', $filename, 'public');
            
            // Save or update image record
            Image::updateOrCreate(
                ['user_id' => Auth::id(), 'role' => 'admin'],
                ['image_path' => $path]
            );
        }

        return back()->with('success', 'Profile image updated successfully!');
    }

    // Doctor Management
    public function storeDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'specialization' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        // Create user account
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // Default password
            'role' => 'doctor',
        ]);

        // Create doctor profile
        Doctor::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'specialization' => $request->specialization,
            'department' => $request->department,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        return response()->json(['success' => true]);
    }

    public function updateDoctor(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $doctor->user_id,
            'specialization' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        // Update user account
        $user = User::find($doctor->user_id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }

        // Update doctor profile
        $doctor->update([
            'name' => $request->name,
            'email' => $request->email,
            'specialization' => $request->specialization,
            'department' => $request->department,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        return response()->json(['success' => true]);
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        
        // Delete user account if exists
        if ($doctor->user_id) {
            User::find($doctor->user_id)?->delete();
        }
        
        // Delete doctor profile
        $doctor->delete();

        return response()->json(['success' => true]);
    }

    // Patient Management
    public function storePatient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'blood_group' => 'nullable|string|max:5',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        // Create user account
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // Default password
            'role' => 'patient',
        ]);

        // Create patient profile
        Patient::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'blood_group' => $request->blood_group,
            'dob' => $request->dob,
            'address' => $request->address,
            'registration_date' => now(),
        ]);

        return response()->json(['success' => true]);
    }

    public function updatePatient(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->user_id,
            'gender' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'blood_group' => 'nullable|string|max:5',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        // Update user account
        $user = User::find($patient->user_id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }

        // Update patient profile
        $patient->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'blood_group' => $request->blood_group,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        return response()->json(['success' => true]);
    }

    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        
        // Delete user account if exists
        if ($patient->user_id) {
            User::find($patient->user_id)?->delete();
        }
        
        // Delete patient profile
        $patient->delete();

        return response()->json(['success' => true]);
    }

    // Staff Management
    public function storeStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'staff_role' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        // Create user account
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // Default password
            'role' => 'staff',
        ]);

        // Create staff profile
        Staff::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'staff_role' => $request->staff_role,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        return response()->json(['success' => true]);
    }

    public function updateStaff(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $staff->user_id,
            'staff_role' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        // Update user account
        $user = User::find($staff->user_id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }

        // Update staff profile
        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'staff_role' => $request->staff_role,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        return response()->json(['success' => true]);
    }

    public function deleteStaff($id)
    {
        $staff = Staff::findOrFail($id);
        
        // Delete user account if exists
        if ($staff->user_id) {
            User::find($staff->user_id)?->delete();
        }
        
        // Delete staff profile
        $staff->delete();

        return response()->json(['success' => true]);
    }
}