@extends('templates.notes')

@section('title', 'Catatan Saya')

@section('content')
<div class="container mt-4">
    <h1>{{ $currentFolder->name }}</h1><hr>
    <p class="text-secondary" style="font-family: Arial, Helvetica, sans-serif;">
        @foreach ($parents as $folder)
	        <span>&raquo;</span>
	        <a href="/notes/{{ $folder->id }}" class="text-secondary" title="{{ $folder->description }}">{{ $folder->name }}</a>
        @endforeach
    </p>
    <div class="row">
        @foreach ($folders as $folder)
	    <div class="col-md-5">
	        <div class="card my-2">
                <div class="card-header">Folder</div>
                <div class="card-body">
	                <h5 class="card-title"><a href="/notes/{{ $folder->id }}" class="text-decoration-none">{{ $folder->name }}</a></h5>
	                <p class="card-text mb-4">{{ $folder->description }}</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#node-modal" data-bs-type="edit-folder" data-fields="id={{ $folder->id }}&name={{ $folder->name }}&description={{ $folder->description }}">Edit</button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#alert-modal" data-bs-href="/notes/delete/folder/{{ $folder->id }}" data-bs-message="Hapus folder {{ $folder->name }}? tindakan ini akan menghapus semua isi di dalamnya juga">Hapus</a>
                </div>
	        </div>
	    </div>
        @endforeach

        @foreach ($notes as $note)
	    <div class="col-md-5">
	        <div class="card my-2">
                <div class="card-body">
	                <h5 class="card-title"><a href="/notes/edit/{{ $note->id }}" class="text-decoration-none">{{ $note->title }}</a></h5>
	                <p class="card-text mb-4">{{ $note->description }}</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#node-modal" data-bs-type="edit-note" data-fields="id={{ $note->id }}&title={{ $note->title }}&description={{ $note->description }}">Edit</button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#alert-modal" data-bs-href="/notes/delete/note/{{ $note->id }}" data-bs-message="Hapus catatan {{ $note->title }} selamanya?">Hapus</a>
                </div>
	        </div>
	    </div>
        @endforeach

        @if ($notes->count() == 0 && $folders->count() == 0)
            <p class="text-center text-secondary">Folder ini kosong</p>
        @endif
    </div>
</div>
@endsection
