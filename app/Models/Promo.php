<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Promo extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date', 'type', 'value', 'with_delivery', 'min_discount', 'max_discount', 'max_limit', 'category_id', 'status', 'discount_used'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'start_date', 'end_date'
    ];

    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = serialize($value);
    }

    public function scopeToggleExpired(Builder $query, $expired = false)
    {
        if ($expired) {
            return $query->whereDate('end_date', '<', date('Y-m-d'));
        }

        return $query->whereDate('end_date', '>=', date('Y-m-d'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
