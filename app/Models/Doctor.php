<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    protected $primaryKey = 'doctor_id';
    
    protected $fillable = [
        'name',
        'email',
        'gender',
        'age',
        'phone',
        'specialization',
        'experience',
        'schedule',
        'user_id',
        'department',
        'dob',
        'address',
    ];

    protected $casts = [
        'schedule' => 'array',
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'doctor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAvailableSlots($date)
    {
        // Define available time slots
        $allSlots = [
            '09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
            '14:00', '14:30', '15:00', '15:30', '16:00', '16:30'
        ];

        // Get booked slots for the date
        $bookedSlots = $this->appointments()
            ->where('date', $date)
            ->whereIn('status', ['pending', 'approved'])
            ->pluck('time')
            ->toArray();

        // Return available slots
        return array_diff($allSlots, $bookedSlots);
    }
}
