<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    const STATUS_IN_WAITING = 1;
    const STATUS_ACCEPTED = 3;
    const STATUS_REFUSED = 4;
    const STATUS_PREPAIRED = 5;
    const STATUS_REDY_FOR_DELIVERY = 6;
    const STATUS_COMPLETED = 7;

    protected $table = 'order_items';

    protected $fillable = [
        'product_id', 'order_id', 'gender', 'address', 'time', 'date', 'notes', 'amount', 'total', 'order_long', 'order_lat', 'status', 'is_express', 'is_charity',
        'refuse_type', 'refuse_reason', 'delivery', 'settlement'

    ];

    protected $with = [
        //'product', 'orderStatus'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderTrackings()
    {
        return $this->hasMany(OrderTracking::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'status', 'id');
    }

    public function inWaiting()
    {
        $this->update(['status' => static::STATUS_IN_WAITING]);

        $this->orderTrackings()->create([
            'user_id' => Auth::user()->id,
            'order_status_id' => static::STATUS_IN_WAITING
        ]);
    }

    public function accept()
    {
        $this->update([
            'status' => static::STATUS_ACCEPTED,
            'delivery' => request('delivery')
        ]);

        $this->orderTrackings()->create([
            'user_id' => Auth::user()->id,
            'order_status_id' => static::STATUS_ACCEPTED
        ]);
    }

    public function refuse()
    {
        $this->update([
            'status' => static::STATUS_REFUSED,
            'refuse_type' => request('refuse_type'),
            'refuse_reason' => request('refuse_reason')
        ]);

        $this->orderTrackings()->create([
            'user_id' => Auth::user()->id,
            'order_status_id' => static::STATUS_REFUSED
        ]);
    }

    public function prepare()
    {
        $this->update(['status' => static::STATUS_PREPAIRED]);

        $this->orderTrackings()->create([
            'user_id' => Auth::user()->id,
            'order_status_id' => static::STATUS_PREPAIRED
        ]);
    }

    public function readyForDelivery()
    {
        $this->update(['status' => static::STATUS_REDY_FOR_DELIVERY]);

        $this->orderTrackings()->create([
            'user_id' => Auth::user()->id,
            'order_status_id' => static::STATUS_REDY_FOR_DELIVERY
        ]);
    }

    public function complete()
    {
        $user = User::where('id', $this->order->user->id)->first();

        $user->update([
            'loyalty_points' => $user->loyalty_points + (int) (($this->total * 250) / 100)
        ]);

        $this->update(['status' => static::STATUS_COMPLETED]);

        $this->orderTrackings()->create([
            'user_id' => Auth::user()->id,
            'order_status_id' => static::STATUS_COMPLETED
        ]);
    }
}
