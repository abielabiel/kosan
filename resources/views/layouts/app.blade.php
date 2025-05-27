<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Booking Kos')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
        background-color: #fce4ec; /* pink soft */
        }
        .navbar {
            background: linear-gradient(to right, #f8bbd0, #f06292); /* pink pastel */
        }
        .btn-pink {
            background-color: #d63384;
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 0.3rem;
            transition: background-color 0.3s ease;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-pink:hover {
            background-color: #bb2d76;
            color: white;
        }
        /* tombol responsive */
        .btn-responsive {
            display: inline-block;
        }
        /* full width di layar kecil */
        @media (max-width: 576px) {
            .btn-responsive {
                display: block;
                width: 100%;
                padding: 0.75rem 1rem;
                font-size: 1.1rem;
            }
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(240, 98, 146, 0.2);
        }
        .footer {
            background-color: #f8bbd0;
            padding: 10px;
            text-align: center;
            color: white;
        }
        .nav-link:hover {
            background-color: #fce4ec;
            border-radius: 5px;
        }
        .active-link {
            background-color: #ec407a !important;
            color: white !important;
            border-radius: 5px;
        }
        .room-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 0.1rem 3rem rgba(255, 98, 195, 0.33);
        }
        .col-md-6.mb-4 img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 0.1rem 3rem rgba(255, 98, 195, 0.33);
        }
        .dropdown-menu {
            background-color: #fce4ec; /* soft pink background */
            border: 1px solid #f8bbd0;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(240, 98, 146, 0.2);
            padding: 10px;
            min-width: 160px;
        }

        .dropdown-menu li a {
            color: #d63384; /* pink text */
            padding: 8px 12px;
            display: block;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .dropdown-menu li a:hover {
            background-color: #f8bbd0;
            color: white;
        }

        .btn-outline-primary {
            color: #d63384; /* pink text */
            border-color: #d63384; /* pink border */
            font-weight: 600;
            border-radius: 8px;
            padding: 6px 16px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #d63384;
            color: white;
            border-color: #d63384;
            box-shadow: 0 4px 10px rgba(214, 51, 132, 0.4);
        }
        .btn.simpan {
            background-color:rgb(151, 233, 166); /* soft pink background */
            color: #fff; /* white text */
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(248, 187, 208, 0.5);
        }

        .btn.simpan:hover {
            background-color:rgb(91, 189, 109); /* darker pink on hover */
            box-shadow: 0 6px 15px rgba(51, 184, 82, 0.4);
            color: #fff;
            cursor: pointer;
        }
        .stat-box {
            padding: 20px 30px;
            border-radius: 15px;
            min-width: 250px;
            color: white;
            text-align: center;
            box-shadow: 0 4px 12px rgba(255, 105, 180, 0.2);
        }

        .pink-box {
            background-color: #f06292;
        }

        .btn-pink-dashboard {
            background-color: #d63384;
            color: white;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 12px;
            text-decoration: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-pink-dashboard:hover {
            background-color: #bb2d76;
            box-shadow: 0 6px 12px rgba(214, 51, 132, 0.4);
            color: white;
        }
        .btn-soft-pink {
            background-color: #f8bbd0; /* soft pink */
            color: #ffffff;
            font-weight: 600;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(248, 187, 208, 0.4);
        }

        .btn-soft-pink:hover {
            background-color: #ec407a; /* slightly darker pink */
            box-shadow: 0 6px 15px rgba(236, 64, 122, 0.5);
            color: white;
        }
        .btn-sm i {
            font-size: 0.9rem;
            margin-right: 3px;
        }


    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="/">Booking Kos</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<footer class="footer mt-5 text-white">
    <small>&copy; {{ date('Y') }} BookingKos. All rights reserved.</small>
</footer>

</body>
</html>
