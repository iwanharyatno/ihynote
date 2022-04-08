<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHY Note | Verifikasi Email</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-4">
        <div class="col-md-8 mx-auto text-center">
            <h1 class="mb-3">Verifikasi email Anda</h1>
            <p>Sebelum anda mulai mencatat, sebaiknya verifikasi alamat email anda terlebih dahulu</p>
            <p>Kami telah mengirimkan tautan untuk memverifikasi email ke alamat email Anda, silahkan cek kotak masuk Email anda dan konfirmasi alamat email Anda.</p>
            <form method="POST" class="mt-4 text-secondary">
                @csrf
	            @if (\Session::has('message'))
	               <div class="alert alert-success alert-dismissible fade show" role="alert">
	                   {!! \Session::get('message') !!}
	                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	               </div>
	            @endif
                <p>Tidak menerima tautan verifikasi? tekan tombol berikut untuk mengirim ulang</p>
                <button type="submit" class="btn btn-primary">Kirim Ulang</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}></script>
</body>
</html>
