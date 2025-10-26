<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
   protected $fillable=[
    'Name','hotel_id','rating','comment'
   ];
       public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}
