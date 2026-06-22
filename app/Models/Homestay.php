<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'price_per_night',
        'capacity',
        'image',
        'description',
        'facilities',
    ];

    // Tambah fungsi ini di dalam fail app/Models/Homestay.php
public function images()
{
    return $this->hasMany(HomestayImage::class, 'homestay_id');
}
}