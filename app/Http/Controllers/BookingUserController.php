<?php

namespace App\Http\Controllers;

use App\Models\BookingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\BookingStatusChanged;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class BookingUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
        ]);

        $room = \App\Models\Room::findOrFail($request->room_id);
        $days = (strtotime($request->check_out) - strtotime($request->check_in)) / 86400;
        $totalPrice = $room->room_price * max($days, 1);

        BookingUser::create([
            'user_id' => Auth::id(),
            'hotel_id' => $request->hotel_id,
            'room_id' => $request->room_id,
            'guest_name' => $request->guest_name,
            'phone_number' => $request->phone_number,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'total_price' => $totalPrice,
        ]);

        return redirect()->back()->with('success', 'Booking created successfully!');
    }

    public function index()
    {
        $bookings = BookingUser::with(['user', 'hotel', 'room'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }
public function updateStatus(Request $request, BookingUser $booking)
{
    $request->validate([
        'status' => 'required|in:Pending,Accepted,Rejected',
    ]);

    $booking->status = $request->status;
    $booking->save();

    
    if ($booking->user && !empty($booking->user->email)) {
        try {
            Mail::to($booking->user->email)
                ->queue(new BookingStatusChanged($booking));

            Log::info("BookingStatusChanged email queued for booking ID: {$booking->id} to {$booking->user->email}");
        } catch (\Exception $e) {
           
            Log::error("Failed to send BookingStatusChanged email for booking ID: {$booking->id}. Error: " . $e->getMessage());
        }
    } else {
        Log::warning("Booking ID: {$booking->id} has no user email. Email not sent.");
    }

    return back()->with('success', 'Booking status updated! Email sending queued.');
}





}
