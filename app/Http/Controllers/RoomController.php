<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.room', ['rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|min:0',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|mimes: jpg,png,jpeg',
        ]);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $ecxtntion = $file->getClientOriginalExtension();
            $filename = time().'.'.$ecxtntion;
            $file->move('rooms', $filename);

            $room = Room::create($request->all());
            $room->update([
                'image' => $filename,
            ]);
        }

        return redirect()->back()->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $ratings = Rating::where('rooms_id', '=', $room->id)->get();

        return view('rooms.room_show', [
            'ratings' => $ratings,
            'room' => $room,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('rooms.room_edit', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|min:0',
            'type' => 'required',
            'description' => 'required',

        ]);

        if($request->hasfile('image')){
            $request->validate([
                'image' => 'required|mimes:png,jpg',
            ]);
            unlink('rooms/'.$room->image);
            $file = $request->file('image');
            $ecxtntion = $file->getClientOriginalExtension();
            $filename = time().'.'.$ecxtntion;
            $file->move('rooms', $filename);

            $room->update([
                'image' => $filename,
            ]);
        }

        $room->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'type' => $request->type,
            'description' => $request->description,
            'available' => $request->available,
        ]);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->back()->with('success', 'تم الاضافة بنجاح');
    }
}
