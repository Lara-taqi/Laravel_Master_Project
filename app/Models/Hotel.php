<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable=[
        'hotel_name','hotel_location','hotel_description','hotel_rating','price_per_night','is_active','image_path'
    ];
        public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function availableRooms()
    {
        return $this->hasMany(Room::class)->where('is_available', true);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
    return $this->hasMany(HotelImg::class);
    }
    

}
