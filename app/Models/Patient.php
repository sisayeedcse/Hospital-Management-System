<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $primaryKey = 'patient_id';
    public $incrementing = true;
    protected $fillable = [
        'name',
        'email',
        'user_id',
        'dob',
        'gender',
        'address',
        'phone',
        'blood_group',
        'registration_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'patient_id');
    }
}
