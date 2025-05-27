@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #d63384;">{{ $room->name }}</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <img src="{{ asset('storage/gambar/' . $room->image) }}" class="card-img-top" alt="{{ $room->name }}">
                <div class="card-body text-center">
                    <p class="text-muted mb-1">From</p>
                    <h5 class="text-success fw-bold mb-2">
                        Rp{{ number_format($room->price_per_night, 0, ',', '.') }}
                    </h5>
                    <p>
                        <i class="bi bi-person-fill"></i> Capacity: {{ $room->capacity }} People
                    </p>
                    <p>
                        <i class="bi bi-tags-fill"></i> Type: {{ ucfirst($room->type) }}
                    </p>
                    <p>{{ $room->description }}</p>
                    <a href="{{ route('bookingtambah') }}" class="btn btn-sm btn-outline-primary">BOOK THIS ROOM</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
