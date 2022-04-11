<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHY Note | Verifikasi Email</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>
<body>
	<div class="modal fade" id="change-email-modal">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title">Ubah Alamat Email</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
                <form action="/email-verification/change-email" method="post">
		            <div class="modal-body">
	                    @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
		                <button type="submit" class="btn btn-primary">Simpan</button>
		            </div>
                </form>
	        </div>
	    </div>
	</div> 
    <div class="container mt-4">
        <div class="col-md-8 mx-auto text-center">
            <h1 class="mb-3">Verifikasi email Anda</h1>
            <p>Sebelum anda mulai mencatat, sebaiknya verifikasi alamat email anda terlebih dahulu</p>
            <p>Kami telah mengirimkan tautan untuk memverifikasi email ke <strong>{{ $user->email }}</strong> (<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#change-email-modal">Edit</a>), silahkan cek kotak masuk Email anda dan klik tautan yang tersedia untuk konfirmasi.</p>
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
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
