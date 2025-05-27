<!-- resources/views/login/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #ffe6f0; font-family: 'Segoe UI', sans-serif; }
        .register-container { min-height: 100vh; }
        .register-card {
            background-color: #fff0f5;
            border-radius: 1rem;
            box-shadow: 0 0 30px rgba(255, 182, 193, 0.4);
            padding: 2rem;
        }
        .btn-pink { background-color: #ffb6c1; color: white; border: none; }
        .btn-pink:hover { background-color: #ff99b6; }
        .form-control:focus {
            border-color: #ffb6c1;
            box-shadow: 0 0 0 0.2rem rgba(255, 182, 193, 0.25);
        }
    </style>
</head>
<body>
<div class="container register-container d-flex align-items-center justify-content-center">
    <div class="col-md-6">
        <div class="card register-card">
            <h3 class="text-center text-dark mb-4">Register</h3>
            <form method="POST" action="{{ route('registeraksi') }}">
                @csrf
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-pink">Daftar</button>
                </div>
                <p class="text-center mt-3">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none text-pink">Login</a>
                </p>
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
</body>
</html>
