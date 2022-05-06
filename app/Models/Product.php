<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const STATUS_WAITING_ACTIVATION = 0;
    const STATUS_ACTIVATETD = 1;
    const STATUS_DEACTIVATED = 2;
    
    protected $fillable = [
        'name', 'name_en', 'cat_id', 'user_id', 'views', 'desc', 'desc_en', 'img', 'price', 'is_product', 'is_hidden', 'prepration_time', 'max_num', 'gender', 'requirement',
        'status', 'is_express', 'express_delivery_time', 'min_quantity', 'is_recommended'
    ];

    protected $with = [
        //'provider'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function productAvailabilities()
    {
        return $this->hasMany(ProductAvailability::class, 'product_id');
    }
}
