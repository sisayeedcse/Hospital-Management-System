<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'phone',
        'assigned_room',
        'role',
        'staff_role',
        'email',
        'dob',
        'gender',
        'address',
        'admin_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
