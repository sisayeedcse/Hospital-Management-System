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
    ];
}
