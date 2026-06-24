<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'user_id',
    'homestay_id',
    'check_in',
    'check_out',
    'guests',
    'total_price',
    'status',
])]
class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}