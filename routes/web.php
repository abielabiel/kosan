<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Models\Room;

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{id_room}', [RoomController::class, 'show'])->name('rooms.show');

Route::get('/', [LoginController::class,'login'])->name('login'); 
Route::post('loginaksi', [LoginController::class,'loginaksi'])->name('loginaksi'); 
Route::get('/home', function () {return view('home');})->middleware('auth');
Route::get('/logout', [LoginController::class, 'logoutaksi'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registeraksi'])->name('registeraksi');


Route::get('/booking', [BookingController::class, 'booking'])->name('booking');
Route::get('/booking/tambah', [BookingController::class,'bookingtambah'])->name('bookingtambah');
Route::post('/booking/simpan', [BookingController::class,'bookingsimpan']);
Route::get('/booking/edit/{idbooking}', [BookingController::class,'bookingedit']);
Route::put('/booking/update/{idbooking}', [BookingController::class,'bookingupdate'])->name('bookingupdate');
Route::get('/booking/edit', [BookingController::class, 'bookingeditlast'])->name('bookingeditlast');
Route::get('/booking/hapus/{idbooking}', [BookingController::class,'bookingdelete']);


Route::get('/penyewa', [PenyewaController::class, 'penyewa'])->name('penyewa');
Route::get('/penyewa/tambah', [PenyewaController::class,'penyewatambah'])->name('penyewatambah');
Route::post('/penyewa/simpan', [PenyewaController::class,'penyewasimpan']);
Route::get('/penyewa/edit/{idpenyewa}', [PenyewaController::class,'penyewaedit'])->name('penyewaedit');
Route::put('/penyewa/update/{idpenyewa}', [PenyewaController::class,'penyewaupdate'])->name('penyewaupdate');
Route::get('/penyewa/hapus/{idpenyewa}', [PenyewaController::class,'penyewadelete']);

Route::get('/home', function () {
    $rooms = Room::all();

    $totalBooking = DB::table('bookings')->where('status', 'diterima')->count();
    $totalPengunjung = DB::table('penyewa')->count();
    $totalPemasukan = DB::table('bookings')
        ->join('rooms', 'bookings.id_room', '=', 'rooms.id_room')
        ->where('bookings.status', 'diterima')
        ->sum('rooms.price_per_night');

    return view('home', compact(
        'rooms',
        'totalBooking',
        'totalPengunjung',
        'totalPemasukan'
    ));
})->middleware('auth');

Route::resource('kos', KosController::class);