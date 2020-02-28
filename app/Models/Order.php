<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_quanity',
        'total_price',
        'note',
        'status',
        'user_id',
        'address',
        'name',
        'email',
        'phone',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cakes()
    {
        return $this->belongsToMany(Cake::class)->withPivot('quanity','price');
    }
}
