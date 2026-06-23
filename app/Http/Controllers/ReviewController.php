<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Homestay;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('homestay')->latest()->get();

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $homestays = Homestay::all();

        return view('reviews.create', compact('homestays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'homestay_id' => 'required',
            'reviewer_name' => 'required',
            'rating' => 'required',
            'comment' => 'required'
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index')
                         ->with('success', 'Review added successfully');
    }

    public function edit(Review $review)
    {
        $homestays = Homestay::all();

        return view('reviews.edit',
            compact('review', 'homestays'));
    }

    public function update(Request $request, Review $review)
    {
        $review->update($request->all());

        return redirect()->route('reviews.index')
                         ->with('success', 'Review updated');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')
                         ->with('success', 'Review deleted');
    }
}