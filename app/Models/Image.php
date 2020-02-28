<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
        'image',
        'cake_id',
    ];

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
}
