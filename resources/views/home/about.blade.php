@extends('templates.home')

@section('title', 'Catatan Online')

@section('content')
<div class="container my-5">
    <div class="row justify-content-evenly">
        <div class="col-md-5">
		    <h1 class="mb-3">Tentang IHY Note</h1>
		    <p>IHY Note adalah sebuah aplikasi catatan online berbasis website yang mengutamakan kesederhanaan dan kemudahan dalam penggunaannya.</p>
		    <p>IHY Note dibangun menggunakan kerangka kerja Laravel dan didukung dengan pustaka pengedit teks TinyMCE.</p>
        </div>
        <div class="col-md-5 mt-4">
            <img class="img-fluid" src="{{ asset('img/screenshots/user-notes.jpg') }}" alt="">
        </div>
    </div>
</div>
@endsection
