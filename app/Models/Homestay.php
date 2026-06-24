<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_per_night',
        'location',
        'image',
        'property_type',
        'star_rating',
        'capacity',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(HomestayImage::class, 'homestay_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }   
}