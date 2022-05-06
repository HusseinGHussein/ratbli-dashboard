<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = [
        'type_id', 'start_date', 'end_date', 'goal', 'amount', 'advertiser'
    ];

    public function advertisingType()
    {
        return $this->belongsTo(AdvertisingType::class, 'type_id');
    }
}
