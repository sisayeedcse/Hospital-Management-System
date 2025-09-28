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

        $doctor = \App\Models\Doctor::where('user_id', Auth::id())->first();
        return view('dashboards.doctor.doctor', compact('doctor'));
    }

    /**
     * Update doctor settings
     */
    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dob' => 'nullable|date',
            'age' => 'nullable|integer|min:0|max:120',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'department' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'experience' => 'nullable|integer|min:0|max:99',
            'schedule' => 'nullable|string|max:255',
        ]);

        $doctor = \App\Models\Doctor::where('user_id', Auth::id())->first();
        if ($doctor) {
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->dob = $request->dob;
            $doctor->age = $request->age;
            $doctor->gender = $request->gender;
            $doctor->phone = $request->phone;
            $doctor->department = $request->department;
            $doctor->specialization = $request->specialization;
            $doctor->address = $request->address;
            $doctor->experience = $request->experience;
            $doctor->schedule = $request->schedule;
            $doctor->save();

            // Optionally update user table if name or email changed
            $user = Auth::user();
            if ($user) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
            }
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Settings updated successfully.'
            ]);
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    /**
     * Handle profile image upload
     */
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $role = $user->role;

        // Save image to upload folder
        $image = $request->file('profile_image');
        $imageName = $role . '_' . $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('upload', $imageName, 'public');

        // Save image path to images table
        \App\Models\Image::updateOrCreate(
            ['user_id' => $user->id, 'role' => $role],
            ['image_path' => $imagePath]
        );

        return redirect()->back()->with('success', 'Profile image uploaded successfully.');
    }
}