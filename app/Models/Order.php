<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order_product';

    protected $fillable = [
        'user_id', 'status', 'area_id', 'address', 'order_id', 'total', 'promo_code_id', 'total_after_discount', 'payment_type', 'payment_no', 'payment_image',
        'payment_date', 'payment_status', 'transfer_amount', 'bank_id', 'currency_rate', 'settlement'
    ];

    protected $with = [
        //'user'
    ];

    public function scopeToggleTestOrders(Builder $query, $isTest = 0)
    {
        return $query->whereHas('user', function ($query) use($isTest) {
            $query->where('is_test', '=', $isTest);
        });
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promo_code_id');
    }
}
