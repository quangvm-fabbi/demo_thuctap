<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quanity',
        'price',
        'price_sale',
        'status',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
