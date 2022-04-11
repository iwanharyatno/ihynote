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
                <div class="col-1 p-0">
                    <a href="{{ $parent }}">
						<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
						 width="100%" height="100%" viewBox="0 0 1280.000000 1280.000000"
						 preserveAspectRatio="xMidYMid meet">
						<g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)"
						fill="#909090" stroke="none">
						<path d="M9009 10946 c-2 -2 -21 -7 -41 -10 -55 -9 -157 -45 -208 -75 -61 -35
						-584 -402 -588 -413 -2 -4 -10 -8 -18 -8 -8 0 -17 -7 -20 -15 -4 -8 -12 -15
						-20 -15 -8 0 -14 -4 -14 -10 0 -5 -6 -10 -13 -10 -7 0 -23 -10 -37 -22 -14
						-13 -37 -29 -51 -36 -15 -8 -38 -25 -52 -38 -14 -13 -29 -24 -32 -24 -3 0 -11
						-4 -18 -10 -57 -47 -76 -60 -86 -60 -6 0 -11 -4 -11 -10 0 -5 -5 -10 -11 -10
						-6 0 -17 -6 -24 -12 -22 -20 -37 -32 -75 -58 -19 -13 -37 -27 -40 -30 -3 -3
						-48 -34 -100 -69 -52 -36 -114 -79 -136 -95 -23 -17 -52 -38 -64 -46 -12 -8
						-45 -32 -73 -53 -68 -49 -75 -53 -192 -136 -55 -38 -113 -80 -130 -91 -16 -12
						-68 -49 -115 -82 -47 -33 -86 -64 -88 -69 -2 -5 -7 -9 -12 -9 -8 0 -161 -103
						-190 -127 -47 -40 -80 -64 -80 -58 0 5 -12 -3 -45 -32 -7 -7 -18 -13 -24 -13
						-6 0 -11 -4 -11 -10 0 -5 -7 -10 -15 -10 -9 0 -18 -7 -21 -15 -4 -8 -12 -15
						-18 -15 -7 0 -22 -9 -34 -20 -12 -11 -25 -20 -31 -20 -5 0 -11 -7 -15 -15 -3
						-8 -10 -15 -16 -15 -6 0 -16 -5 -23 -10 -49 -41 -104 -80 -114 -80 -6 0 -13
						-4 -15 -8 -3 -9 -128 -100 -240 -176 -32 -22 -58 -43 -58 -48 0 -4 -5 -8 -11
						-8 -10 0 -194 -126 -321 -220 -33 -25 -75 -54 -92 -65 -17 -10 -32 -23 -34
						-27 -2 -4 -10 -8 -18 -8 -8 0 -17 -7 -20 -15 -4 -8 -12 -15 -20 -15 -8 0 -14
						-4 -14 -9 0 -5 -8 -12 -18 -15 -10 -4 -27 -14 -38 -24 -31 -28 -123 -92 -133
						-92 -5 0 -11 -3 -13 -8 -1 -4 -32 -28 -68 -54 -36 -26 -70 -51 -76 -56 -5 -5
						-20 -14 -31 -21 -12 -6 -27 -17 -35 -23 -7 -7 -40 -30 -72 -52 -33 -21 -64
						-43 -70 -48 -59 -48 -73 -58 -83 -58 -7 0 -13 -3 -13 -7 0 -5 -21 -21 -48 -38
						-26 -16 -51 -35 -55 -42 -4 -7 -13 -13 -18 -13 -6 0 -16 -6 -23 -12 -8 -7 -24
						-20 -36 -28 -13 -8 -48 -33 -79 -55 -31 -22 -113 -81 -184 -130 -70 -49 -127
						-93 -127 -97 0 -5 -5 -6 -10 -3 -6 3 -13 -1 -16 -9 -3 -9 -12 -16 -18 -16 -7
						0 -22 -9 -34 -20 -12 -11 -26 -20 -32 -20 -5 0 -10 -4 -10 -9 0 -5 -8 -12 -17
						-15 -10 -3 -29 -16 -43 -29 -14 -13 -29 -24 -33 -24 -5 -1 -20 -10 -33 -22
						-13 -12 -28 -21 -33 -21 -5 0 -12 -7 -15 -16 -3 -8 -10 -12 -16 -9 -6 3 -13
						-1 -16 -9 -3 -9 -10 -16 -15 -16 -6 0 -15 -5 -22 -10 -47 -39 -62 -50 -78 -55
						-11 -4 -19 -11 -19 -16 0 -5 -6 -9 -14 -9 -8 0 -16 -7 -20 -15 -3 -8 -12 -15
						-20 -15 -8 0 -16 -3 -18 -8 -5 -12 -105 -82 -117 -82 -6 0 -11 -3 -11 -8 0 -4
						-29 -27 -65 -51 -36 -24 -65 -48 -65 -53 0 -4 -5 -8 -10 -8 -13 0 -90 -75 -90
						-87 0 -4 -9 -14 -20 -21 -11 -7 -20 -19 -20 -26 0 -8 -4 -16 -8 -18 -4 -1 -21
						-25 -38 -53 -26 -44 -38 -69 -74 -160 -33 -81 -60 -305 -40 -330 4 -5 13 -37
						19 -70 7 -33 16 -69 20 -80 73 -179 152 -281 294 -376 34 -24 64 -45 67 -49 3
						-3 34 -26 70 -50 119 -80 264 -180 345 -237 44 -31 107 -74 140 -97 33 -23 62
						-43 65 -46 3 -3 52 -37 110 -75 58 -39 110 -74 117 -80 6 -5 27 -20 45 -33 18
						-12 85 -58 148 -101 63 -44 120 -84 127 -90 7 -6 15 -11 19 -11 4 0 17 -8 28
						-19 12 -10 77 -57 146 -103 69 -47 176 -121 238 -164 62 -43 173 -120 245
						-170 163 -111 284 -195 362 -250 33 -24 116 -81 185 -128 69 -47 159 -108 200
						-137 155 -109 230 -161 395 -274 94 -64 195 -135 225 -156 30 -22 111 -78 180
						-125 69 -47 160 -110 203 -140 104 -73 223 -155 327 -226 47 -32 132 -91 190
						-131 58 -40 143 -99 190 -132 47 -32 114 -78 150 -103 36 -25 128 -89 205
						-142 77 -53 174 -120 215 -149 41 -29 93 -65 115 -79 22 -15 45 -31 52 -37 6
						-5 40 -29 75 -53 35 -24 113 -77 173 -119 129 -89 245 -146 332 -163 86 -17
						313 -8 378 14 129 45 251 121 317 197 24 27 53 60 65 74 17 20 75 127 78 145
						0 3 6 14 12 25 30 56 45 164 40 292 -5 127 -35 263 -57 263 -6 0 -9 3 -8 7 5
						13 -56 125 -69 130 -7 3 -13 10 -13 15 0 14 -149 158 -174 169 -12 5 -52 32
						-91 59 -38 28 -108 77 -153 108 -46 31 -96 66 -111 77 -16 11 -68 47 -117 80
						-49 33 -93 64 -99 68 -5 5 -55 39 -110 77 -55 38 -111 77 -125 88 -14 10 -83
						59 -155 107 -71 49 -155 106 -185 128 -30 21 -91 63 -135 92 -44 30 -111 77
						-150 105 -38 28 -77 53 -85 57 -8 4 -17 10 -20 13 -3 4 -21 18 -41 31 -83 56
						-209 141 -272 186 -110 78 -217 153 -302 211 -44 30 -94 65 -111 78 -17 13
						-34 24 -38 24 -4 0 -14 6 -21 13 -15 13 -32 25 -275 192 -91 63 -176 122 -190
						133 -24 18 -115 80 -404 276 -147 100 -189 129 -196 136 -3 3 -32 23 -65 45
						-33 22 -94 64 -135 93 -41 29 -82 57 -90 62 -8 6 -60 41 -115 80 -100 69 -133
						92 -360 248 -66 46 -172 119 -235 163 -63 44 -131 91 -152 104 -20 13 -39 28
						-42 33 -5 8 99 85 332 245 39 28 72 54 72 59 0 4 5 8 11 8 14 0 189 122 189
						132 0 4 6 8 13 8 7 0 30 16 52 35 22 19 46 35 53 35 6 0 12 5 12 10 0 6 6 10
						13 10 6 0 30 16 52 35 22 19 43 35 48 35 4 0 20 11 35 25 15 14 32 25 39 25 6
						0 13 4 15 9 2 5 57 46 123 92 66 45 122 85 125 88 3 4 25 20 50 36 25 17 50
						33 55 37 51 38 108 78 145 103 43 29 50 34 84 63 8 6 18 12 22 12 4 0 14 7 23
						16 13 12 116 87 201 144 101 69 216 153 218 161 2 5 8 9 13 9 8 0 209 137 254
						172 6 5 24 20 40 33 17 14 36 25 43 25 7 0 15 7 18 15 4 8 10 12 15 9 5 -3 12
						2 15 10 3 9 11 16 18 16 9 0 28 13 83 60 7 5 16 10 22 10 5 0 11 3 13 8 4 9
						103 82 113 82 3 0 13 6 20 13 26 22 38 31 278 200 131 92 248 176 260 187 11
						11 27 20 34 20 7 0 13 4 13 8 0 5 17 18 38 30 21 11 46 30 57 42 10 11 23 20
						29 20 10 0 28 13 83 60 7 5 16 10 22 10 5 0 11 3 13 8 5 11 75 62 86 62 6 0
						12 4 14 8 3 9 107 84 253 184 79 53 116 80 162 118 7 6 15 10 18 10 3 0 11 5
						18 10 45 38 61 50 67 50 4 0 18 10 31 21 13 12 40 32 59 45 19 13 53 36 75 52
						22 15 63 44 90 63 115 80 145 103 145 111 0 4 3 7 8 6 29 -10 256 200 268 248
						3 13 10 24 14 24 8 0 91 220 97 260 10 61 3 223 -12 287 -17 67 -87 220 -122
						264 -47 59 -176 179 -192 179 -5 0 -16 6 -23 14 -8 7 -65 32 -128 56 -106 39
						-124 42 -231 46 -64 2 -118 2 -120 0z"/>
						</g>
						</svg>
                    </a>
                </div>
	            <div class="col-8">
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
            const data = encodeURI('_token={{ csrf_token() }}&title=' + title.value + '&content=' + editor.getContent());

            saveChanges(data, function(report) {
                if (report.readyState === 4) {
                    if (report.status === 200) {
                        showAlert('Perubahan berhasil disimpan!', 'success');
                    } else {
                        showAlert('Gagal menyimpan perubahan (' + report.status + ')', 'danger');
                    }

	                saveButton.toggleAttribute('disabled');
                    saveButton.textContent = 'Simpan';
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
