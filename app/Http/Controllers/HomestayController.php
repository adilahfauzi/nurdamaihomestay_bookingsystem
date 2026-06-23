<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homestay;

class HomestayController extends Controller
{
    // LIST HOMESTAY (WITH SORTING)
    public function index(Request $request)
    {
        // Guna query builder supaya boleh susun data secara dinamik
        $query = Homestay::query();

        // Semak jika user ada pilih option susunan (sort)
        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price_per_night', 'asc'); // Harga: Rendah ke Tinggi
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price_per_night', 'desc'); // Harga: Tinggi ke Rendah
            } elseif ($request->sort == 'rating_desc') {
        $query->orderBy('star_rating', 'desc');
    }
        } else {
            // Susunan default jika user baru buka page (contoh: yang terbaru didaftar)
            $query->orderBy('created_at', 'desc');
        }

        // Ambil data yang sudah disusun
        $homestays = $query->get();

        // Hanya hantar variable homestays sahaja ke view (Array kosong sudah dibuang)
        return view('homestays.index', compact('homestays'));
    }

    // DETAIL HOMESTAY
    public function show($id)
{
    // Cari homestay bersama-sama dengan gambar tambahannya sekali
    $homestay = Homestay::with('images')->findOrFail($id);
    
    return view('homestays.detail', compact('homestay')); 
    // *Nota: Tukar 'homestays.show' mengikut nama fail detail blade anda jika berbeza
}
}