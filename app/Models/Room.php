<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
     use HasFactory;
  protected $fillable=[
   'hotel_id','room_type','room_capacity','room_price','is_available','room_description',
   ];
   public function hotel()
   {
      return $this->belongsTo(Hotel::class);
   }

   public function bookings()
   {
      return $this->hasMany(BookingUser::class);
   }
       public function isAvailableForDates($checkIn, $checkOut)
    {
        return !$this->bookings()
            ->where(function($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                     ->orWhereBetween('check_out', [$checkIn, $checkOut])
                     ->orWhere(function($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                           ->where('check_out', '>=', $checkOut);
                      });
            })
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();
    }

}
