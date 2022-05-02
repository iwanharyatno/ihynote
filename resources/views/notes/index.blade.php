@extends('templates.notes')

@section('title', 'Catatan Saya')

@section('content')
@if (session('move_node'))
    <x-utils.move-node :currentFolder="$currentFolder"/>
@endif
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
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
	                    <h5 class="card-title"><a href="/notes/{{ $folder->id }}" class="text-decoration-none">{{ $folder->name }}</a></h5>
                        <p class="card-text">{{ $folder->description }}</p>
                    </div>
                    <div class="btn-group dropstart">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"></button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><h6 class="dropdown-header">Pilih aksi</h6></li>
                            <li><a href="/notes/move/folder/{{ $folder->id }}?source_dir_id={{ $currentFolder->id }}" class="dropdown-item">Pindah</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#node-modal" data-bs-type="edit-folder" data-fields="id={{ $folder->id }}&name={{ $folder->name }}&description={{ $folder->description }}">Edit</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#alert-modal" data-bs-href="/notes/delete/folder/{{ $folder->id }}" data-bs-message="Hapus folder {{ $folder->name }}? tindakan ini akan menghapus semua isi di dalamnya juga">Hapus</a></li>
                        </ul>
                    </div>
                </div>
	        </div>
	    </div>
        @endforeach

        @foreach ($notes as $note)
	    <div class="col-md-5">
	        <div class="card my-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
	                    <h5 class="card-title"><a href="/notes/edit/{{ $note->id }}" class="text-decoration-none">{{ $note->title }}</a></h5>
                        <p class="card-text">{{ $note->description }}</p>
                    </div>
                    <div class="btn-group dropstart">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"></button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><h6 class="dropdown-header">Pilih aksi</h6></li>
                            <li><a href="/notes/move/note/{{ $note->id }}" class="dropdown-item">Pindah</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#node-modal" data-bs-type="edit-note" data-fields="id={{ $note->id }}&title={{ $note->title }}&description={{ $note->description }}">Edit</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#alert-modal" data-bs-href="/notes/delete/note/{{ $note->id }}" data-bs-message="Hapus catatan {{ $note->title }} selamanya?">Hapus</a></li>
                        </ul>
                    </div>
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
