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
        <div class="bg-white rounded shadow-sm p-4">
            <div class="text-center mb-4">
            <h3 class="fw-bold">DASHBOARD</h3>
        </div>
</br>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <div class="stat-box pink-box">
                <p class="mb-1">Total Pemasukan</p>
                <h3 class="fw-bold">Rp{{ number_format($totalPemasukan, 0, ',', '.') }}</h3>
            </div>

            <div class="stat-box pink-box">
                <p class="mb-1">Total Booking (Diterima)</p>
                <h3 class="fw-bold">{{ $totalBooking }}</h3>
            </div>

            <div class="stat-box pink-box">
                <p class="mb-1">Total Pengunjung</p>
                <h3 class="fw-bold">{{ $totalPengunjung }}</h3>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('bookingtambah') }}" class="btn btn-pink-dashboard">+ Tambah Booking</a>
        </div>
        
@endsection
