<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homestay;

class HomestayController extends Controller
{
    public function index(Request $request)
    {
        $query = Homestay::with('reviews');

        if ($request->sort == 'price_asc') {
            $query->orderBy('price_per_night', 'asc');
        }

        elseif ($request->sort == 'price_desc') {
            $query->orderBy('price_per_night', 'desc');
        }

        elseif ($request->sort == 'rating_desc') {
            $query->orderBy('star_rating', 'desc');
        }

        elseif ($request->sort == 'capacity_desc') {
            $query->orderBy('capacity', 'desc');
        }

        else {
            $query->latest();
        }

        $homestays = $query->get();

        return view('homestays.index', compact('homestays'));
    }

    public function show($id)
    {
        $homestay = Homestay::with('reviews')->findOrFail($id);

        return view('homestays.detail', compact('homestay'));
    }
}