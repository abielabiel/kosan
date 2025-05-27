<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Booking Kos')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ...css & js... -->
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="bg-white p-3 shadow-sm" style="height: 650px;">
                <h5 class="mb-3">Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('booking') }}">Detail Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('penyewa') }}">Penyewa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('booking') }}">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('booking') }}">Fasilitas</a>
                    </li>
                    @if(isset($rooms))
                        @foreach ($rooms as $room)
                            <a href="{{ route('rooms.show', ['id_room' => $room->id_room]) }}">Lihat Kamar</a>
                        @endforeach
                    @endif
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
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>