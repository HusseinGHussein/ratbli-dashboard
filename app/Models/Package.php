<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "loyalty_points_package";

    protected $fillable = [
        'name', 'points', 'value', 'status', 'factor', 'factor_end_date',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'factor_end_date'
    ];
}
