<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductException extends Model
{
    protected $table = 'product_exeption_date';

    protected $fillable = [
        'date', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
