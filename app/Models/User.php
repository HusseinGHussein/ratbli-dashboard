<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'user_name', 'pic', 'email', 'firebase_token', 'password', 'charge_cost', 'express_charge_cost', 'phone', 'address', 'v_code', 'verified', 'blocked',
        'cat_id', 'type', 'communication', 'currency_id', 'area_id', 'is_vendor', 'is_admin', 'is_test', 'fees', 'token', 'country', 'nation_id', 'city_id', 'login_by', 'device_type',
        'attempts', 'login_via_mobile', 'login_via_dashboard', 'available_from', 'available_to', 'lat', 'lng', 'loyalty_points', 'is_vat', 'is_recommended', 'is_sponsored'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        //
    ];

    protected $with = [
        //
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_category', 'cat_id', 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasManyThrough(OrderItem::class, Product::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'provider_id');
    }
}
