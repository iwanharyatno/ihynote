<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catatan - {{ $note->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#note-editor',
            mobile: {
                menubar: true
            }
        });
    </script>
</head>
<body>
    <div class="container mt-4">
        <form action="/notes/edit/{{ $note->id }}/save" method="POST">
	        @csrf
	        <div class="row justify-content-between mb-3">
	            <div class="col-9">
	                <input id="title" class="form-control" type="text" name="title" value="{{ $note->title }}">
	            </div>
	            <div class="col-3">
	                <button type="submit" class="btn btn-primary">Simpan</button>
	            </div>
	        </div>
	        <div class="row px-2">
	            <textarea id="note-editor" name="content" style="position: absolute; height: 85%">{{ $note->content }}</textarea>
	        </div>
        </form>
    </div>
</body>
</html>
