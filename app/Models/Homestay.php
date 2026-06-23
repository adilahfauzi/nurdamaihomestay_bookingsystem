<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $fillable = [
        'name'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}