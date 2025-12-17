<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'description',
        'parent_id',
    ];

    /**
     * Get the parent gallery (album)
     */
    public function parent()
    {
        return $this->belongsTo(Gallery::class, 'parent_id');
    }

    /**
     * Get child galleries (items in album)
     */
    public function children()
    {
        return $this->hasMany(Gallery::class, 'parent_id');
    }

    /**
     * Check if this is an album (no parent)
     */
    public function isAlbum(): bool
    {
        return $this->parent_id === null;
    }

    /**
     * Check if this is an item (has parent)
     */
    public function isItem(): bool
    {
        return $this->parent_id !== null;
    }
}
