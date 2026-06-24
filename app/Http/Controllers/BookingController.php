<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Homestay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('homestay')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create($homestay_id)
    {
        $homestay = Homestay::findOrFail($homestay_id);

        return view('bookings.create', compact('homestay'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'homestay_id' => ['required', 'exists:homestays,id'],
            'check_in' => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'guests' => ['required', 'integer', 'min:1'],
        ]);

        $homestay = Homestay::findOrFail($request->homestay_id);

        $isBooked = Booking::where('homestay_id', $request->homestay_id)
            ->whereIn('status', ['Pending', 'Approved'])
            ->where(function ($query) use ($request) {
                $query->where('check_in', '<', $request->check_out)
                      ->where('check_out', '>', $request->check_in);
            })
            ->exists();

        if ($isBooked) {
            return back()
                ->withInput()
                ->with('error', 'This homestay is not available for the selected dates.');
        }

        $days = date_diff(
            date_create($request->check_in),
            date_create($request->check_out)
        )->days;

        $price = $homestay->price_per_night ?? $homestay->price ?? 0;

        $totalPrice = $days * $price;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'homestay_id' => $request->homestay_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'total_price' => $totalPrice,
            'status' => 'Pending',
        ]);

        return redirect()->route('bookings.success', $booking->id);
    }

    public function show($id)
    {
        $booking = Booking::with('homestay')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('bookings.show', compact('booking'));
    }

    public function cancel($id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);

        if ($booking->status !== 'Pending') {
            return back()->with('error', 'Only pending bookings can be cancelled.');
        }

        $booking->status = 'Cancelled';
        $booking->save();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking cancelled successfully.');
    }

    public function success($id)
    {
        $booking = Booking::with('homestay')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('bookings.success', compact('booking'));
    }
}