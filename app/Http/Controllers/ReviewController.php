<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Homestay;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('homestay')
            ->latest()
            ->get();

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

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review submitted successfully!');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $homestays = Homestay::all();

        return view('reviews.edit', compact(
            'review',
            'homestays'
        ));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $review->update($request->all());

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review updated successfully!');
    }

    public function destroy($id)
    {
        Review::destroy($id);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review deleted successfully!');
    }
}