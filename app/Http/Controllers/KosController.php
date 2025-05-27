<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosController extends Controller
{
   public function index()
    {
        $kos = Kos::all(); // Ambil semua data dari DB
        return view('home', compact('kos')); // Kirim ke home.blade.php
    }
}