<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'parent_id', 'provider_id', 'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
