@extends('templates.home')

@section('title', 'Catatan Online')

@section('content')
<header class="home-header">
    <div class="container">
        <h1>IHY Note</h1>
        <p>Aplikasi Catatan Online yang mudah digunakan. Tuangkan semua pikiran, ide, atau apapun itu di sini.</p>
    </div>
</header>
<div class="container mt-5">
    <div class="row justify-content-evenly">
        <div class="col-md-8 text-center">
            <h1 class="mb-3" id="about">Apa itu IHY Note?</h1>
            <p>IHY Note adalah sebuah aplikasi catatan online berbasis Website yang mengutamakan kesederhanaan dan kemudahan penggunaan aplikasi.</p>
        </div>
    </div>
    <div class="row justify-content-evenly mt-5">
        <div class="col-md-5">
            <h2>Edit sesuka Hati</h2>
            <p>Buat dan Edit catatan menggunakan Teks Editor oleh TinyMCE</p>
        </div>
        <div class="col-md-5 mt-3">
            <img src="{{ asset('/img/screenshots/editor.jpg') }}" class="img-fluid shadow">
        </div>
    </div>
    <div class="row justify-content-evenly mt-5">
        <div class="col-md-5">
            <h2>Kelola catatan Anda</h2>
            <p>Buat folder dan kelompokkan catatan Anda seperti di Penyimpanan Sendiri</p>
        </div>
        <div class="col-md-5 mt-3">
            <img src="{{ asset('/img/screenshots/folder.jpg') }}" class="img-fluid shadow">
        </div>
    </div>
</div>
@endsection 
