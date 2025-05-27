<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BookingModel;
use App\Models\User;
use App\Models\Room;
use App\Models\PenyewaModel;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BookingController extends Controller
{
    use ValidatesRequests;
    
    public function booking()
    {
        $bookings = BookingModel::with(['penyewa', 'room'])->get();
        return view('booking.booking', compact('bookings'));
    }

    public function bookingtambah()
    {
        $penyewa = PenyewaModel::all();
        $rooms = Room::all();
        return view('booking/bookingtambah', compact('penyewa', 'rooms'));
    }

    public function bookingsimpan(Request $request)
    {
        $this->validate($request, [
            'id_penyewa' => 'required',
            'id_room' => 'required',
            'price_per_night' => 'required|numeric',
            'total_price' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
            'status' => 'required',
        ]);

        BookingModel::create([
            'id_penyewa' => $request->id_penyewa,
            'id_room' => $request->id_room,
            'price_per_night' => $request->price_per_night,
            'total_price' => $request->total_price,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'status' => $request->status,
        ]);

        return redirect('/booking')->with('success', 'Data booking berhasil ditambahkan');
    }

    public function bookingedit($idbooking)
    {
        $booking = BookingModel::findOrFail($idbooking);
        $penyewa = PenyewaModel::all();
        $rooms = Room::all();
        return view('booking.bookingedit', compact('booking', 'penyewa', 'rooms'));
    }

    public function bookingupdate($idbooking, Request $request)
    {
        $this->validate($request, [
            'id_penyewa' => 'required',
            'id_room' => 'required',
            'price_per_night' => 'required|numeric',
            'total_price' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
            'status' => 'required',
        ]);

        $booking = BookingModel::findOrFail($idbooking);
        $booking->id_penyewa = $request->id_penyewa;
        $booking->id_room = $request->id_room;
        $booking->price_per_night = $request->price_per_night;
        $booking->total_price = $request->total_price;
        $booking->tanggal_masuk = $request->tanggal_masuk;
        $booking->tanggal_keluar = $request->tanggal_keluar;
        $booking->status = $request->status;
        $booking->save();

        return redirect('/booking')->with('success', 'Data booking berhasil diperbarui');
    }

    public function bookingeditlast()
    {
        $booking = BookingModel::latest('id')->first();
        $penyewa = PenyewaModel::all();
        $rooms = Room::all();
        return view('booking.bookingedit', compact('booking', 'penyewa', 'rooms'));
    }

    public function bookingdelete($idbooking) 
    { 
        $databooking = BookingModel::findOrFail($idbooking); 
        $databooking->delete(); 
        
        return redirect('/booking')->with('success', 'Data booking berhasil dihapus');
    }
}
