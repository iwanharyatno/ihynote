<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>
<body class="px-4">
    <div class="container mt-4">
        <div class="col-md-6 mx-auto">
            <form action="/login" method="POST" class="border rounded p-4">
                <h1 class="text-center mb-3">Login</h1> 
                @csrf
                @error('email')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn btn-primary my-2 w-100">Login</button>
                <p class="form-text mt-2">Belum punya akun? <a href="/register">Daftar!</a></p>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>
