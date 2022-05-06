<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Voucher extends Model
{
    protected $table = 'promos';

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
