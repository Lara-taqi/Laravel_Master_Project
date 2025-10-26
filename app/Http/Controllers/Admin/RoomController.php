<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('hotel')->get();
        $hotels=Hotel::all();
        return view('admin.rooms.index', compact('rooms','hotels'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('admin.rooms.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type' => 'required|string|max:255',
            'room_capacity' => 'required|integer|min:1',
            'room_price' => 'required|numeric|min:0',
            'room_description' => 'nullable|string',
        ]);

        Room::create([
            'hotel_id' => $request->hotel_id,
            'room_type' => $request->room_type,
            'room_capacity' => $request->room_capacity,
            'room_price' => $request->room_price,
            'room_description' => $request->room_description,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()->route('admin.rooms.index')
            ->with('success', '  Room Added Successfully');
    }
    public function show(Room $room)
{
    return view('admin.rooms.show', compact('room'));
}


    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        return view('admin.rooms.edit', compact('room', 'hotels'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type' => 'required|string|max:255',
            'room_capacity' => 'required|integer|min:1',
            'room_price' => 'required|numeric|min:0',
            'room_description' => 'nullable|string',
        ]);

        $room->update([
            'hotel_id' => $request->hotel_id,
            'room_type' => $request->room_type,
            'room_capacity' => $request->room_capacity,
            'room_price' => $request->room_price,
            'room_description' => $request->room_description,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Room updated successfully');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')
            ->with('success', ' Room Removed Successfully');
    }
}
