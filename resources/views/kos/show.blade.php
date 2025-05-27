@extends('layouts.app')

@section('title', 'Detail Kos')

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ $kos->gambar }}" alt="{{ $kos->nama }}" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
        <h2>{{ $kos->nama }}</h2>
        <p><strong>Alamat:</strong> {{ $kos->alamat }}</p>
        <p>{{ $kos->deskripsi }}</p>
        <a href="{{ url('/') }}" class="btn btn-pink">Kembali</a>
    </div>
</div>
@endsection
