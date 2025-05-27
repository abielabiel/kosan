<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'image', 'type', 'capacity', 'price_per_night', 'description'];
    protected $primaryKey = 'id_room';
}
