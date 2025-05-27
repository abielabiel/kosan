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
            <div class="row">
    <h4>
    </h4>
    
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #d63384;">Available Rooms</h2>

    <div class="row">
        @foreach ($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/gambar/' . $room->image) }}" class="room-img" alt="{{ $room->name }}">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">From</p>
                        <h5 class="text-success fw-bold mb-2">
                            Rp{{ number_format($room->price_per_night, 0, ',', '.') }}
                        </h5>
                        <h6 class="card-title">{{ $room->name }}</h6>
                        <p class="card-text mb-1">
                            <i class="bi bi-person-fill"></i> {{ $room->capacity }} People
                        </p>
                        <p class="card-text">
                            <i class="bi bi-tags-fill"></i> {{ ucfirst($room->type) }}
                        </p>
                        <a href="{{ route('rooms.show', ['id_room' => $room->id_room]) }}" class="btn btn-sm btn-outline-primary">BOOK NOW ></a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
        
@endsection
