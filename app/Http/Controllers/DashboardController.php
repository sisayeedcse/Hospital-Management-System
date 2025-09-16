<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Staff;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $staffs = Staff::all();

        return view('dashboards.admin.admin', [
            'doctors' => $doctors,
            'patients' => $patients,
            'staffs' => $staffs
        ]);
    }

    // Doctor Edit
    public function editDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('dashboards.admin.edit_doctor', compact('doctor'));
    }

    public function updateDoctor(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->specialty = $request->specialty;
        $doctor->save();
        return redirect('/admin');
    }

    public function deleteDoctor($id)
    {
        Doctor::destroy($id);
        return redirect('/admin');
    }

    // Patient Edit
    public function editPatient($id)
    {
        $patient = Patient::findOrFail($id);
        return view('dashboards.admin.edit_patient', compact('patient'));
    }

    public function updatePatient(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->gender = $request->gender;
        $patient->save();
        return redirect('/admin');
    }

    public function deletePatient($id)
    {
        Patient::destroy($id);
        return redirect('/admin');
    }
}
