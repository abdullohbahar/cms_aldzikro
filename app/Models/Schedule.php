<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'day',
        'time',
        'activity',
    ];

    // Available days
    public static $days = [
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu',
    ];
}
