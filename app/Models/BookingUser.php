<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingUser extends Model
{
    use HasFactory;

    protected $table = 'bookinguser';

    protected $fillable = [
        'user_id',
        'hotel_id',
        'room_id',
        'guest_name',
        'phone_number',
        'check_in',
        'check_out',
        'guests',
        'total_price',
        'status'
    ];

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
