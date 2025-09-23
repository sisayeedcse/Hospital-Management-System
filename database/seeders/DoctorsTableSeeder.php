<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Cardiology' => [
                ['name' => 'Dr. Sarah Johnson', 'email' => 'sarah.johnson@hospital.com', 'gender' => 'female', 'age' => 35, 'phone' => '+1-555-0101', 'experience' => 8],
                ['name' => 'Dr. Michael Brown', 'email' => 'michael.brown@hospital.com', 'gender' => 'male', 'age' => 42, 'phone' => '+1-555-0102', 'experience' => 12],
                ['name' => 'Dr. Jennifer Lee', 'email' => 'jennifer.lee@hospital.com', 'gender' => 'female', 'age' => 38, 'phone' => '+1-555-0103', 'experience' => 10],
                ['name' => 'Dr. David Wilson', 'email' => 'david.wilson@hospital.com', 'gender' => 'male', 'age' => 45, 'phone' => '+1-555-0104', 'experience' => 15],
                ['name' => 'Dr. Maria Garcia', 'email' => 'maria.garcia@hospital.com', 'gender' => 'female', 'age' => 33, 'phone' => '+1-555-0105', 'experience' => 6]
            ],
            'Neurology' => [
                ['name' => 'Dr. Robert Chen', 'email' => 'robert.chen@hospital.com', 'gender' => 'male', 'age' => 48, 'phone' => '+1-555-0201', 'experience' => 14],
                ['name' => 'Dr. Lisa Anderson', 'email' => 'lisa.anderson@hospital.com', 'gender' => 'female', 'age' => 41, 'phone' => '+1-555-0202', 'experience' => 11],
                ['name' => 'Dr. James Taylor', 'email' => 'james.taylor@hospital.com', 'gender' => 'male', 'age' => 39, 'phone' => '+1-555-0203', 'experience' => 9],
                ['name' => 'Dr. Amanda White', 'email' => 'amanda.white@hospital.com', 'gender' => 'female', 'age' => 36, 'phone' => '+1-555-0204', 'experience' => 7],
                ['name' => 'Dr. Christopher Davis', 'email' => 'christopher.davis@hospital.com', 'gender' => 'male', 'age' => 44, 'phone' => '+1-555-0205', 'experience' => 13]
            ],
            'Orthopedics' => [
                ['name' => 'Dr. Emily Rodriguez', 'email' => 'emily.rodriguez@hospital.com', 'gender' => 'female', 'age' => 40, 'phone' => '+1-555-0301', 'experience' => 12],
                ['name' => 'Dr. Mark Thompson', 'email' => 'mark.thompson@hospital.com', 'gender' => 'male', 'age' => 37, 'phone' => '+1-555-0302', 'experience' => 8],
                ['name' => 'Dr. Rachel Green', 'email' => 'rachel.green@hospital.com', 'gender' => 'female', 'age' => 35, 'phone' => '+1-555-0303', 'experience' => 6],
                ['name' => 'Dr. Kevin Martinez', 'email' => 'kevin.martinez@hospital.com', 'gender' => 'male', 'age' => 43, 'phone' => '+1-555-0304', 'experience' => 11],
                ['name' => 'Dr. Nicole Clark', 'email' => 'nicole.clark@hospital.com', 'gender' => 'female', 'age' => 32, 'phone' => '+1-555-0305', 'experience' => 5]
            ],
            'Pediatrics' => [
                ['name' => 'Dr. Lisa Thompson', 'email' => 'lisa.thompson@hospital.com', 'gender' => 'female', 'age' => 34, 'phone' => '+1-555-0401', 'experience' => 7],
                ['name' => 'Dr. Daniel Kim', 'email' => 'daniel.kim@hospital.com', 'gender' => 'male', 'age' => 31, 'phone' => '+1-555-0402', 'experience' => 4],
                ['name' => 'Dr. Sarah Miller', 'email' => 'sarah.miller@hospital.com', 'gender' => 'female', 'age' => 29, 'phone' => '+1-555-0403', 'experience' => 3],
                ['name' => 'Dr. Andrew Johnson', 'email' => 'andrew.johnson@hospital.com', 'gender' => 'male', 'age' => 38, 'phone' => '+1-555-0404', 'experience' => 10],
                ['name' => 'Dr. Jessica Brown', 'email' => 'jessica.brown@hospital.com', 'gender' => 'female', 'age' => 27, 'phone' => '+1-555-0405', 'experience' => 2]
            ],
            'Dermatology' => [
                ['name' => 'Dr. James Wilson', 'email' => 'james.wilson@hospital.com', 'gender' => 'male', 'age' => 46, 'phone' => '+1-555-0501', 'experience' => 16],
                ['name' => 'Dr. Michelle Adams', 'email' => 'michelle.adams@hospital.com', 'gender' => 'female', 'age' => 42, 'phone' => '+1-555-0502', 'experience' => 12],
                ['name' => 'Dr. Steven Moore', 'email' => 'steven.moore@hospital.com', 'gender' => 'male', 'age' => 39, 'phone' => '+1-555-0503', 'experience' => 9],
                ['name' => 'Dr. Ashley Turner', 'email' => 'ashley.turner@hospital.com', 'gender' => 'female', 'age' => 36, 'phone' => '+1-555-0504', 'experience' => 6],
                ['name' => 'Dr. Brian Scott', 'email' => 'brian.scott@hospital.com', 'gender' => 'male', 'age' => 44, 'phone' => '+1-555-0505', 'experience' => 14]
            ],
            'Gynecology' => [
                ['name' => 'Dr. Patricia Davis', 'email' => 'patricia.davis@hospital.com', 'gender' => 'female', 'age' => 45, 'phone' => '+1-555-0601', 'experience' => 15],
                ['name' => 'Dr. Jennifer Hall', 'email' => 'jennifer.hall@hospital.com', 'gender' => 'female', 'age' => 41, 'phone' => '+1-555-0602', 'experience' => 11],
                ['name' => 'Dr. Michael Young', 'email' => 'michael.young@hospital.com', 'gender' => 'male', 'age' => 38, 'phone' => '+1-555-0603', 'experience' => 8],
                ['name' => 'Dr. Lisa King', 'email' => 'lisa.king@hospital.com', 'gender' => 'female', 'age' => 33, 'phone' => '+1-555-0604', 'experience' => 5],
                ['name' => 'Dr. Robert Wright', 'email' => 'robert.wright@hospital.com', 'gender' => 'male', 'age' => 47, 'phone' => '+1-555-0605', 'experience' => 17]
            ],
            'ENT' => [
                ['name' => 'Dr. Thomas Allen', 'email' => 'thomas.allen@hospital.com', 'gender' => 'male', 'age' => 43, 'phone' => '+1-555-0701', 'experience' => 13],
                ['name' => 'Dr. Susan Baker', 'email' => 'susan.baker@hospital.com', 'gender' => 'female', 'age' => 40, 'phone' => '+1-555-0702', 'experience' => 10],
                ['name' => 'Dr. Matthew Carter', 'email' => 'matthew.carter@hospital.com', 'gender' => 'male', 'age' => 37, 'phone' => '+1-555-0703', 'experience' => 7],
                ['name' => 'Dr. Elizabeth Phillips', 'email' => 'elizabeth.phillips@hospital.com', 'gender' => 'female', 'age' => 35, 'phone' => '+1-555-0704', 'experience' => 5],
                ['name' => 'Dr. William Evans', 'email' => 'william.evans@hospital.com', 'gender' => 'male', 'age' => 49, 'phone' => '+1-555-0705', 'experience' => 18]
            ]
        ];

        foreach ($departments as $specialization => $doctors) {
            foreach ($doctors as $doctor) {
                Doctor::create([
                    'name' => $doctor['name'],
                    'email' => $doctor['email'],
                    'gender' => $doctor['gender'],
                    'age' => $doctor['age'],
                    'phone' => $doctor['phone'],
                    'specialization' => $specialization,
                    'experience' => $doctor['experience'],
                    'schedule' => json_encode([
                        'monday' => ['09:00', '10:00', '11:00', '14:00', '15:00'],
                        'tuesday' => ['09:00', '10:00', '11:00', '14:00', '15:00'],
                        'wednesday' => ['09:00', '10:00', '11:00', '14:00', '15:00'],
                        'thursday' => ['09:00', '10:00', '11:00', '14:00', '15:00'],
                        'friday' => ['09:00', '10:00', '11:00', '14:00', '15:00']
                    ])
                ]);
            }
        }
    }
}
