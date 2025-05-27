<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
