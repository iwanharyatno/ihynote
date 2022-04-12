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
            menubar: false
        });
    </script>
</head>
<body>
    <div class="container mt-4">
	    <div id="alert-container"></div>
        <form action="/notes/edit/{{ $note->id }}/save" method="POST">
	        <div class="row justify-content-between align-items-center mb-3 px-2">
                <div class="col-1 p-0 text-center">
                    <a href="{{ $parent }}">
                        <svg viewBox="0, 0, 50, 50" width="2rem">
							<line x1="10" y1="25" x2="25" y2="40" stroke-width="4" stroke="#909090"/>
							<line x1="10" y1="25" x2="25" y2="10" stroke-width="4" stroke="#909090"/>
							<line x1="8.75" y1="25" x2="40" y2="25" stroke-width="4" stroke="#909090"/>
						</svg>
                    </a>
                </div>
	            <div class="col-8 p-0 text-center">
	                <input id="title" class="form-control w-100" type="text" name="title" value="{{ $note->title }}">
	            </div>
	            <div class="col-3 ps-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
	            </div>
	        </div>
	        <div class="row px-2">
	            <textarea id="note-editor" name="content" style="position: absolute; height: 85%">{{ $note->content }}</textarea>
	        </div>
        </form>
    </div>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script>
        const form = document.forms[0];

        const title = document.querySelector('input[name="title"]');
        const saveButton = form.querySelector('button[type="submit"]');
        const alertContainer = document.querySelector('#alert-container');

        form.onsubmit = function(evt) {
            evt.preventDefault();
            saveButton.toggleAttribute('disabled');
            saveButton.innerHTML = '<span class="spinner-border spinner-border-sm text-white"></span>';

            const editor = tinymce.get('note-editor');
            const data = '_token={{ csrf_token() }}&title=' + title.value + '&content=' + encodeURIComponent(editor.getContent());

            saveChanges(data, function(report) {
                if (report.readyState === 4) {
                    if (report.status === 200) {
                        showAlert('Perubahan berhasil disimpan!', 'success');
                    } else {
                        showAlert('Gagal menyimpan perubahan (' + report.status + ')', 'danger');
                    }

	                saveButton.toggleAttribute('disabled');
                    saveButton.textContent = 'Simpan';

                    console.log(report.responseText);
                }
            });
        };

        function saveChanges(data, callback) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                callback({
                    readyState: this.readyState,
                    status: this.status,
                    responseText: this.responseText
                });
            };
            xhr.send(data);
        }

        function showAlert(message, type) {
            const wrapper = document.createElement('div');
            wrapper.classList.add('alert', 'alert-' + type, 'alert-dismissible');
            wrapper.innerHTML = message + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            alertContainer.appendChild(wrapper);
        }
    </script>
</body>
</html>
