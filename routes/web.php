<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('reviews', ReviewController::class);

    Route::get('/homestays', [HomestayController::class, 'index'])
        ->name('homestays.index');

    Route::get('/homestays/{id}', [HomestayController::class, 'show'])
        ->name('homestays.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/{homestay_id}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::get('/bookings/{id}/success', [BookingController::class, 'success'])
        ->name('bookings.success');
});

require __DIR__.'/auth.php';