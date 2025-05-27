<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenyewaModel extends Model 
{
    protected $table = 'penyewa';
        protected $primaryKey = 'id_penyewa'; // Primary key
        protected $fillable = [
            'name',
            'email',
            'no_telp',
            'alamat'
        ];
}