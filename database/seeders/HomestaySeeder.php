<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homestay;
use App\Models\HomestayImage;

class HomestaySeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // 1. HOMESTAY 1
        // =========================
        $h1 = Homestay::create([
            'name' => 'Nur Damai Homestay 1',
            'description' => 'Homestay suitable for family gathering with spacious living area.',
            'price_per_night' => 450,
            'location' => 'Ipoh, Perak',
            'image' => 'images/ndhs1.png',
            'facilities' => 'Free high-speed WiFi, Smart TV with Netflix, Kitchen, Aircond',
            'property_type' => 'Bungalow',
            'star_rating' => 5,
            'capacity' => 40,
        ]);

        HomestayImage::insert([
            [
                'homestay_id' => $h1->id,
                'image_path' => 'images/ndhs1_1.png',
            ],
            [
                'homestay_id' => $h1->id,
                'image_path' => 'images/ndhs1_2.png',
            ],
        ]);


        // =========================
        // 2. HOMESTAY 2
        // =========================
        $h2 = Homestay::create([
            'name' => 'Nur Damai Homestay 2',
            'description' => 'Strategic location near city center, suitable for short stay.',
            'price_per_night' => 320,
            'location' => 'Ipoh, Perak',
            'image' => 'images/ndhs2.jpg',
            'facilities' => 'WiFi, Smart TV, Netflix, BBQ set',
            'property_type' => 'Apartment',
            'star_rating' => 5,
            'capacity' => 30,
        ]);

        HomestayImage::insert([
            [
                'homestay_id' => $h2->id,
                'image_path' => 'images/ndhs2_1.jpg',
            ],
            [
                'homestay_id' => $h2->id,
                'image_path' => 'images/ndhs2_2.jpg',
            ],
        ]);


        // =========================
        // 3. HOMESTAY 3
        // =========================
        $h3 = Homestay::create([
            'name' => 'Nur Damai Homestay 3',
            'description' => 'Relax and chill stay with peaceful environment.',
            'price_per_night' => 250,
            'location' => 'Ipoh, Perak',
            'image' => 'images/ndhs3.jpg',
            'facilities' => 'WiFi, TV Netflix, BBQ facilities, Kitchen',
            'property_type' => 'House',
            'star_rating' => 5,
            'capacity' => 20,
        ]);

        HomestayImage::insert([
            [
                'homestay_id' => $h3->id,
                'image_path' => 'images/ndhs3_1.jpg',
            ],
            [
                'homestay_id' => $h3->id,
                'image_path' => 'images/ndhs3_2.jpg',
            ],
        ]);


        // =========================
        // 4. HOMESTAY 4
        // =========================
        $h4 = Homestay::create([
            'name' => 'Nur Damai Homestay 4',
            'description' => 'Affordable stay suitable for budget travelers.',
            'price_per_night' => 200,
            'location' => 'Ipoh, Perak',
            'image' => 'images/ndhs4.jpg',
            'facilities' => 'WiFi, Smart TV, Netflix subscription',
            'property_type' => 'Studio',
            'star_rating' => 5,
            'capacity' => 20,
        ]);

        HomestayImage::insert([
            [
                'homestay_id' => $h4->id,
                'image_path' => 'images/ndhs4_1.jpg',
            ],
            [
                'homestay_id' => $h4->id,
                'image_path' => 'images/ndhs4_2.jpg',
            ],
        ]);
    }
}