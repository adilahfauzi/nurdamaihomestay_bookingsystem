<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomestayImage extends Model
{
    use HasFactory;

    // Masukkan kolum yang dibenarkan untuk diisi data
    protected $fillable = ['homestay_id', 'image_path'];
}