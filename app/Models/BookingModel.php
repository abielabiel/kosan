<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model 
{
    protected $table = 'bookings';
        protected $primaryKey = 'id'; // Primary key
        protected $fillable = [
            'id_penyewa',
            'id_room',
            'price_per_night',
            'total_price',
            'tanggal_masuk',
            'tanggal_keluar',
            'status'
        ];

    public function user()
        {
            return $this->belongsTo(User::class);
        }

    public function kos()
        {
            return $this->belongsTo(Kos::class);
        }
    
    public function penyewa()
    {
        return $this->belongsTo(\App\Models\PenyewaModel::class, 'id_penyewa', 'id_penyewa');
    }

    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class, 'id_room', 'id_room');
    }
}