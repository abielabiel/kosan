@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Booking - <strong>EDIT DATA</strong>
        </div>

        <div class="card-body">
            <a href="/booking" class="btn btn-sm btn-outline-primary">Kembali</a>
            <br><br>

            <form method="post" action="{{ route('bookingupdate', $booking->id) }}">
                @csrf
                @method('PUT')

                <!-- Penyewa -->
                <div class="form-group">
                    <label for="id_penyewa">Nama</label>
                    <input type="text" name="id_penyewa" id="id_penyewa" class="form-control" 
                        placeholder="Nama Penyewa" 
                        value="{{ old('id_penyewa', $booking->id_penyewa) }}">
                    @error('id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </br>
                <!-- Kamar -->
                <div class="form-group">
                    <label>Jenis Kamar</label>
                    <select name="id_room" class="form-control" id="room_select">
                        <option value="">-- Pilih Jenis Kamar --</option>
                        @foreach($rooms as $r)
                            <option 
                                value="{{ $r->id_room }}" 
                                data-price="{{ $r->price_per_night }}" 
                                {{ $booking->id_room == $r->id_room ? 'selected' : '' }}>
                                {{ $r->name }} - Rp{{ number_format($r->price_per_night, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_room')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </br>
                <!-- Harga per Malam -->
                <div class="form-group">
                    <label>Harga per Malam</label>
                    <input 
                        type="text" 
                        name="price_per_night" 
                        id="price_per_night" 
                        class="form-control" 
                        value="{{ $booking->price_per_night }}" 
                        readonly>
                    @error('price_per_night')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </br>
                <!-- Total Harga -->
                <div class="form-group">
                    <label>Total Harga</label>
                    <input 
                        type="text" 
                        name="total_price" 
                        id="total_price" 
                        class="form-control" 
                        value="{{ $booking->total_price }}" 
                        readonly>
                    @error('total_price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </br>
                <!-- Tanggal Masuk -->
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input 
                        type="date" 
                        name="tanggal_masuk" 
                        class="form-control" 
                        value="{{ $booking->tanggal_masuk }}">
                    @error('tanggal_masuk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </br>
                <!-- Tanggal Keluar -->
                <div class="form-group">
                    <label>Tanggal Keluar</label>
                    <input 
                        type="date" 
                        name="tanggal_keluar" 
                        class="form-control" 
                        value="{{ $booking->tanggal_keluar }}">
                    @error('tanggal_keluar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </br>
                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ $booking->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $booking->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </br>
                <div class="form-group">
                    <input type="submit" class="btn simpan" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script: Hitung Harga Otomatis -->
<script>
    function updatePrice(select) {
        const selectedOption = select.options[select.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        document.getElementById('price_per_night').value = price;
    }

    function updateTotal() {
        const price = parseInt(document.getElementById('price_per_night').value || 0);
        const checkIn = new Date(document.querySelector('[name="tanggal_masuk"]').value);
        const checkOut = new Date(document.querySelector('[name="tanggal_keluar"]').value);

        if (!isNaN(checkIn) && !isNaN(checkOut) && checkOut > checkIn) {
            const diffTime = Math.abs(checkOut - checkIn);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            const total = price * diffDays;
            document.getElementById('total_price').value = total;
        } else {
            document.getElementById('total_price').value = '';
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const select = document.getElementById('room_select');
        select.addEventListener('change', function () {
            updatePrice(this);
            updateTotal();
        });

        document.querySelector('[name="tanggal_masuk"]').addEventListener('change', updateTotal);
        document.querySelector('[name="tanggal_keluar"]').addEventListener('change', updateTotal);

        updatePrice(select);
        updateTotal();
    });
</script>
@endsection
