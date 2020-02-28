<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $fillable = [
        'name',
        'status',
        'image',
        'price',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
