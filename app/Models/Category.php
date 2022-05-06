<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name', 'name_en', 'desc', 'desc_en', 'lang', 'img', 'img_en', 'icon', 'is_offer', 'published'
    ];

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
