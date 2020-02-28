<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'is_enable',
        'cake_id',
        'user_id',
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
