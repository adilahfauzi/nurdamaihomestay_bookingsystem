<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::truncate();

        Review::insert([

            // Homestay 1
            [
                'homestay_id' => 1,
                'reviewer_name' => 'Nurul',
                'rating' => 5,
                'comment' => 'Very clean and comfortable homestay. Highly recommended.',
                'photo' => 'review1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 1,
                'reviewer_name' => 'Aisyah',
                'rating' => 4,
                'comment' => 'Good location and friendly host.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 1,
                'reviewer_name' => 'Nadia',
                'rating' => 5,
                'comment' => 'The homestay was very clean and suitable for family gatherings.',
                'photo' => 'review2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 1,
                'reviewer_name' => 'Faiz',
                'rating' => 4,
                'comment' => 'Strategic location and easy access to nearby attractions.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 1,
                'reviewer_name' => 'Haziq',
                'rating' => 5,
                'comment' => 'Amazing stay and complete facilities.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Homestay 2
            [
                'homestay_id' => 2,
                'reviewer_name' => 'Amir',
                'rating' => 5,
                'comment' => 'Spacious room and excellent facilities.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 2,
                'reviewer_name' => 'Sarah',
                'rating' => 4,
                'comment' => 'Beautiful environment and comfortable stay.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 2,
                'reviewer_name' => 'Aina',
                'rating' => 5,
                'comment' => 'Very comfortable stay and the facilities were complete.',
                'photo' => 'review3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 2,
                'reviewer_name' => 'Irfan',
                'rating' => 4,
                'comment' => 'Friendly host and smooth check-in process.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 2,
                'reviewer_name' => 'Sabrina',
                'rating' => 5,
                'comment' => 'Worth every penny and very clean.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Homestay 3
            [
                'homestay_id' => 3,
                'reviewer_name' => 'Farah',
                'rating' => 3,
                'comment' => 'Overall okay but parking space is limited.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 3,
                'reviewer_name' => 'Hakim',
                'rating' => 5,
                'comment' => 'Excellent service and very clean rooms.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 3,
                'reviewer_name' => 'Balqis',
                'rating' => 5,
                'comment' => 'The room was spacious and beautifully decorated.',
                'photo' => 'review4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 3,
                'reviewer_name' => 'Daniel',
                'rating' => 4,
                'comment' => 'Nice experience overall. Recommended for short stays.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 3,
                'reviewer_name' => 'Aqilah',
                'rating' => 5,
                'comment' => 'Very peaceful environment and clean facilities.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Homestay 4
            [
                'homestay_id' => 4,
                'reviewer_name' => 'Siti',
                'rating' => 4,
                'comment' => 'Nice place for family vacation.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 4,
                'reviewer_name' => 'Azlan',
                'rating' => 5,
                'comment' => 'Worth every penny. Will come again.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 4,
                'reviewer_name' => 'Hannah',
                'rating' => 5,
                'comment' => 'Excellent homestay with beautiful surroundings.',
                'photo' => 'review5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 4,
                'reviewer_name' => 'Syafiq',
                'rating' => 4,
                'comment' => 'Good value for money and comfortable rooms.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'homestay_id' => 4,
                'reviewer_name' => 'Mira',
                'rating' => 5,
                'comment' => 'Highly recommended for family and friends.',
                'photo' => 'review6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
