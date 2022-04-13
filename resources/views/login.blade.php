@extends('templates.home')

@section('title', 'Masuk')

@section('content')
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
            <div class="form-check mb-3">
                <input type="checkbox" id="remember" class="form-check-input" name="remember" checked>
                <label for="remember" class="form-check-label"><small>Buat saya tetap masuk</small></label>
            </div>
            <button type="submit" class="btn btn-primary my-2 w-100">Login</button>
            <p class="form-text mt-2">Belum punya akun? <a href="/register">Daftar!</a></p>
        </form>
    </div>
</div>
@endsection
