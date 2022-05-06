<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    protected $fillable = [
        'name', 'name_en', 'code', 'currency_code', 'currency_name', 'currency_name_en', 'status', 'flag'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
