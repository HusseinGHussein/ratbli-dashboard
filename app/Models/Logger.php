<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'description', 'item_id', 'type', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
