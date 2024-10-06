<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($booking_id)
    {
        $booking = Booking::find($booking_id);

        return view('rating.rating_create', [
            'booking' => $booking,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stars' => 'required',
            'comment' => 'required',
        ]);

        Rating::create([
            'stars' => $request->stars,
            'comment' => $request->comment,
            'users_id' => Auth::user()->id,
            'booking_id' => $request->booking_id,
            'rooms_id' => $request->rooms_id,
        ]);

        return redirect()->route('booking.index')->with('success', 'شكرا لك');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($rating_id)
    {
        $rating = Rating::find($rating_id);
        $booking = Booking::find($rating->booking->id);

        return view('rating.reating_edit', ['rating' => $rating, 'booking' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $rating_id)
    {
        $request->validate([
            'stars' => 'required',
            'comment' => 'required',
        ]);

        $rating = Rating::find($rating_id);

        $rating->update([
            'stars' => $request->stars,
            'comment' => $request->comment,
        ]);

        return redirect()->route('booking.index')->with('success', 'شكرا لك');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        $rating->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
