<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'homestay_id',
        'reviewer_name',
        'rating',
        'comment',
        'photo',
    ];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}