@extends('templates.notes')

@section('title', 'Catatan Saya')

@section('content')
<div class="container mt-4">
    <h1>{{ $currentFolder->name }}</h1><hr>
    <div class="row">
        @foreach ($folders as $folder)
	    <div class="col-md-5">
	        <div class="card my-2">
                <div class="card-header">Folder</div>
                <div class="card-body">
	                <h5 class="card-title"><a href="/notes/{{ $folder->id }}">{{ $folder->name }}</a></h5>
	                <p class="card-text">{{ $folder->description }}</p>
                </div>
	        </div>
	    </div>
        @endforeach

        @foreach ($notes as $note)
	    <div class="col-md-5">
	        <div class="card my-2">
                <div class="card-body">
	                <h5 class="card-title">{{ $note->title }}</h5>
	                <p class="card-text">{{ $note->description }}</p>
                </div>
	        </div>
	    </div>
        @endforeach
    </div>
</div>
@endsection
