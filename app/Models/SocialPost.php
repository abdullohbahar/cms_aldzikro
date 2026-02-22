<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    protected $fillable = [
        'platform',
        'post_id',
        'title',
        'url',
        'thumbnail',
        'posted_at',
        'is_active',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'is_active' => 'boolean',
    ];
}
