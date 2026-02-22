<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    protected $fillable = [
        'name',
        'age',
        'gender',
        'address',
        'guardian_name',
        'guardian_phone',
        'status',
    ];
}
