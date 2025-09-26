<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $adminUser = User::where('email', 'admin@hospital.com')->first();
        
        if (!$adminUser) {
            // Create admin user
            $adminUser = User::create([
                'name' => 'Hospital Administrator',
                'email' => 'admin@hospital.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);

            // Create admin profile
            Admin::create([
                'user_id' => $adminUser->id,
                'name' => 'Hospital Administrator',
                'email' => 'admin@hospital.com',
                'phone' => '+1234567890',
                'address' => '123 Hospital Street, Medical District',
            ]);
        }
    }
}
