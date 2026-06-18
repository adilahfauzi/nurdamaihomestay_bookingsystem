<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'homestay_name',
        'check_in',
        'check_out',
        'guests',
        'total_price',
        'status'
    ];
}