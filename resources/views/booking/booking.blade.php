@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <h4>
    </h4>
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="bg-white p-3 shadow-sm" style="height: 650px;">
            <h5 class="mb-3">Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-dark" style="border-radius: 5px;" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('rooms.index') }}">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('penyewa') }}">Penyewa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('booking') }}">Booking</a>
                </li>
                </br>
                <li class="nav-item">
                    @if(Auth::check())
                <div class="dropdown ms-auto me-3">
                    <a class="dropdown-toggle text-decoration-none text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->email }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data Booking
                </div>
                
                <div class="card-body">
                    <a href="/booking/tambah" class="btn btn-soft-pink">Input Data Baru</a>
                    <br/>
                    <br/>
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID Booking</th>
                                <th>Nama Pengunjung</th>
                                <th>Jenis Kamar</th>
                                <th>Harga Kamar</th> 
                                <th>Total Harga</th>                              
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->penyewa->name ?? '-' }}</td>
                                <td>{{ $booking->room->name ?? '-' }}</td>
                                <td>{{ $booking->price_per_night }}</td>
                                <td>{{ $booking->total_price }}</td>
                                <td>{{ $booking->tanggal_masuk }}</td>
                                <td>{{ $booking->tanggal_keluar }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    <a href="/booking/edit/{{ $booking->id }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="/booking/hapus/{{ $booking->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus Data?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
@endsection