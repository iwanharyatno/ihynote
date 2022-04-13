@extends('templates.home')

@section('title', 'Masuk')

@section('content')
<div class="container mt-4">
    <div class="col-md-6 mx-auto">
        <form action="/register" method="POST" class="p-4 border rounded">
            <h1 class="text-center mb-3">Daftar</h1> 
            @error('email')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan alamat email" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Buat sebuah password" required>
            </div>
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                <input type="password" id="password-confirm" class="form-control" placeholder="Ketik ulang password yang sama" required>
            </div>
            <button type="submit" class="btn btn-primary my-2 w-100">Daftar</button>
            <p class="form-text mt-2">Sudah punya akun? <a href="/login">Masuk!</a></p>
        </form>
    </div>
</div>

<script>
    const password = document.getElementById('password');
    const passwordConfirm = document.getElementById('password-confirm');

    document.forms[0].onsubmit = function(evt) {
        evt.preventDefault();
        if (password.value === passwordConfirm.value) {
            this.submit();
        } else {
            alert("Konfirmasi password salah!");
        }
    }
</script>
@endsection
</body>
</html>
