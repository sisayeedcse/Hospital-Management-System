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

        $patient = \App\Models\Patient::where('user_id', Auth::id())->first();
        return view('dashboards.patient.patient', compact('patient'));
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

    /**
     * Update patient and user settings
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();
        $patient = \App\Models\Patient::where('user_id', $user->id)->first();

        // Update user table
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Update patient table
        if ($patient) {
            $patient->name = $request->name;
            $patient->email = $request->email;
            $patient->save();
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}