<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'cake_order';
    
    protected $fillable = [
        'quanity',
        'price',
        'order_id',
        'cake_id',
    ];

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
