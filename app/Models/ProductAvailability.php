<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAvailability extends Model
{
    protected $table = 'product_availibility';

    protected $fillable = [
        'product_id', 'day_no', 'gender', 'quantity', 'period'
    ];
}
