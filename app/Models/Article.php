<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_path',
        'is_published',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get the user who created this article
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category of this article
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
