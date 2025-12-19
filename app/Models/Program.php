<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'image_path',
    ];

    /**
     * Get the sub programs for the program.
     */
    public function subPrograms()
    {
        return $this->hasMany(SubProgram::class);
    }
}
