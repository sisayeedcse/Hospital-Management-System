<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    // Show patient dashboard
    public function dashboard()
    {
        $section = request()->get('section', 'dashboard');

        $patient = Patient::where('user_id', Auth::id())->first();
        $appointments = collect();

        if ($patient) {
            $appointments = Appointment::with('doctor')
                ->where('patient_id', $patient->patient_id)
                ->orderBy('date', 'desc')
                ->get();
        }

        return view('dashboards.patient.patient', compact('appointments', 'section'));
    }

    // Search doctors by department
    public function searchDoctors(Request $request)
    {
        $department = $request->get('department');
        $date = $request->get('date');

        $doctors = Doctor::where('specialization', $department)->get();

        return response()->json([
            'doctors' => $doctors,
            'date' => $date
        ]);
    }

    // Book a new appointment
    public function bookAppointment(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,doctor_id',
            'date' => 'required|date|after_or_equal:today',
            'specialization' => 'required|string'
        ]);

        $patient = Patient::where('user_id', Auth::id())->first();
        if (!$patient) {
            return response()->json(['error' => 'Patient profile not found'], 404);
        }

        $doctor = Doctor::find($request->doctor_id);

        $appointment = Appointment::create([
            'patient_id' => $patient->patient_id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'time' => $request->time ?? '10:00',
            'specialization' => $request->specialization,
            'fees' => $request->fees ?? 500,
            'status' => 'Confirmed'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Appointment booked successfully!',
            'appointment' => $appointment->load('doctor')
        ]);
    }

    // Cancel an appointment
    public function cancelAppointment(Request $request)
    {
        $appointmentId = $request->get('appointment_id');
        $patient = Patient::where('user_id', Auth::id())->first();

        if (!$patient) {
            return response()->json(['error' => 'Patient profile not found'], 404);
        }

        $appointment = Appointment::where('appointment_no', $appointmentId)
            ->where('patient_id', $patient->patient_id)
            ->first();

        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        $appointment->update(['status' => 'Cancelled']);

        return response()->json([
            'success' => true,
            'message' => 'Appointment cancelled successfully!'
        ]);
    }

    // Reschedule an appointment
    public function rescheduleAppointment(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,appointment_no',
            'new_date' => 'required|date|after_or_equal:today'
        ]);

        $patient = Patient::where('user_id', Auth::id())->first();
        if (!$patient) {
            return response()->json(['error' => 'Patient profile not found'], 404);
        }

        $appointment = Appointment::where('appointment_no', $request->appointment_id)
            ->where('patient_id', $patient->patient_id)
            ->first();

        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        $appointment->update([
            'date' => $request->new_date,
            'status' => 'Pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Appointment rescheduled successfully!'
        ]);
    }

    // Get list of departments (hard-coded)
    public function getDepartments()
    {
        $departments = [
            'Cardiology', 'Neurology', 'Orthopedics', 'Pediatrics',
            'Dermatology', 'Gynecology', 'ENT'
        ];

        return response()->json($departments);
    }
}
