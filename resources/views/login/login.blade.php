<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffe6f0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
        }

        .login-card {
            background-color: #fff0f5;
            border-radius: 1rem;
            box-shadow: 0 0 30px rgba(255, 182, 193, 0.4);
            padding: 2rem;
        }

        .btn-pink {
            background-color: #ffb6c1;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background-color: #ff99b6;
        }

        .form-control:focus {
            border-color: #ffb6c1;
            box-shadow: 0 0 0 0.2rem rgba(255, 182, 193, 0.25);
        }
    </style>
</head>
<body>

<div class="container login-container d-flex align-items-center justify-content-center">
    <div class="col-md-6">
        <div class="card login-card">
            <h3 class="text-center text-dark mb-4">Login</h3>

            <!-- Alert error -->
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            <!-- Hidden inputs to trick autofill -->
            <input type="text" style="display:none">
            <input type="password" style="display:none">

            <form method="POST" action="{{ route('loginaksi') }}" autocomplete="off">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           required
                           autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required
                           autocomplete="new-password">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-pink">Login</button>
                </div>

                <p class="text-center mt-3">Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-decoration-none text-pink">Register</a>
                </p>

            </form>
            
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
