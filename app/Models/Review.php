<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'homestay_id',
        'reviewer_name',
        'rating',
        'comment'
    ];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}