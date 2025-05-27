<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalBooking = DB::table('bookings')->where('status', 'diterima')->count();
        $totalPengunjung = DB::table('penyewa')->count();
        $totalPemasukan = DB::table('bookings')
            ->join('rooms', 'bookings.id_room', '=', 'rooms.id_room')
            ->where('bookings.status', 'diterima')
            ->sum('rooms.price_per_night');

        return view('home', [
            'totalBooking' => $totalBooking,
            'totalPengunjung' => $totalPengunjung,
            'totalPemasukan' => $totalPemasukan,
        ]);
    }
}
