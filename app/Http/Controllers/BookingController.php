<?php

namespace App\Http\Controllers;

use App\Mail\BookingMassege;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = [];

        if(Auth::user()->role == 'مسؤول نظام' || Auth::user()->role == 'super_admin') {
            $bookings = Booking::all();
        } else {
            $bookings = Booking::where('users_id', '=', Auth::user()->id)->get();
        }

        return view('booking.booking', ['bookings' => $bookings]);
    }

    public function select_time(Request $request)
    {
        $room = Room::find($request->room_id);
        $now = Carbon::now()->format('H');
        $bookings = Booking::where('rooms_id', '=', $room->id)->whereDate('day', '=', $request->day)->get();
        return view('booking.select_time', ['room' => $room, 'day' => $request->day, 'bookings' => $bookings, 'now' => $now]);
    }

    public function select_the_month_table(Request $request)
    {
        $room = Room::find($request->room);
        $month = Carbon::parse($request->month);
        $now = Carbon::now();

        $days_of_the_month = [
            'Saturday' => [],
            'Sunday' => [],
            'Monday' => [],
            'Tuesday' => [],
            'Wednesday' => [],
            'Thursday' => [],
        ];

        $month_format = '';

        for ($i = 1; $i <= $month->daysInMonth(); $i++){

            $month_format = Carbon::create($month->format('Y'), $month->format('m'), $i);

            if($month_format->format('l') != 'Friday'){
                if($month_format->format('l') == 'Saturday'){
                    array_push($days_of_the_month['Saturday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Sunday'){
                    array_push($days_of_the_month['Sunday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Monday'){
                    array_push($days_of_the_month['Monday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Tuesday'){
                    array_push($days_of_the_month['Tuesday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Wednesday'){
                    array_push($days_of_the_month['Wednesday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Thursday'){
                    array_push($days_of_the_month['Thursday'], $month_format->format('Y-m-d'));
                }
            }
        }
        return view('booking.time_table', [
            'days_of_the_month' => $days_of_the_month,
            'month' => $month,
            'room' => $room,
            'now' => $now,
            'carrent' => $request->month,
        ]);
    }

    public function time_table(Request $request)
    {
        $room = Room::find($request->room_id);
        $month = Carbon::now();

        $days_of_the_month = [
            'Saturday' => [],
            'Sunday' => [],
            'Monday' => [],
            'Tuesday' => [],
            'Wednesday' => [],
            'Thursday' => [],
        ];

        $month_format = '';

        for ($i = 1; $i <= $month->daysInMonth(); $i++){

            $month_format = Carbon::create($month->format('Y'), $month->format('m'), $i);

            if($month_format->format('l') != 'Friday'){
                if($month_format->format('l') == 'Saturday'){
                    array_push($days_of_the_month['Saturday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Sunday'){
                    array_push($days_of_the_month['Sunday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Monday'){
                    array_push($days_of_the_month['Monday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Tuesday'){
                    array_push($days_of_the_month['Tuesday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Wednesday'){
                    array_push($days_of_the_month['Wednesday'], $month_format->format('Y-m-d'));
                }
                if($month_format->format('l') == 'Thursday'){
                    array_push($days_of_the_month['Thursday'], $month_format->format('Y-m-d'));
                }
            }
        }
        return view('booking.time_table', [
            'days_of_the_month' => $days_of_the_month,
            'month' => $month,
            'room' => $room,
            'now' => $month,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_hour' => 'required',
            'room' => 'required',
            'day' => 'required',
        ]);

        Booking::create([
            'start_time_end_time' => $request->booking_hour,
            'day' => Carbon::create($request->day),
            'rooms_id' => $request->room,
            'users_id' => Auth::id(),
        ]);

        return redirect()->route('room.index')->with('success', 'تم الحجز بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    public function message_form($booking_id)
    {
        $booking = Booking::find($booking_id);
        return view('booking.massege_form', ['booking' => $booking]);
    }

    public function send_massege(Request $request)
    {
        $request->validate([
            'massege' => 'required',
        ]);

        $booking = Booking::find($request->booking_id);

        Mail::to($booking->users->email)->send(new BookingMassege([
            'username' => $booking->users->name,
            'room' => $booking->rooms->name,
            'massege' => $request->massege,
        ]));

        return redirect()->back()->with('success', 'تم الارسال بنجاح');
    }
}
