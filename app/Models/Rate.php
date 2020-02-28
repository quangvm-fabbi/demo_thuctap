<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'user_id',
        'cake_id',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
}
