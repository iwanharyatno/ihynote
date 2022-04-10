<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>
<body>
    <!-- Modal -->
	<div class="modal fade" id="node-modal" data-bs-backdrop="static" data-bs-keyboard="false">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="staticBackdropLabel">Buat baru</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
                <form action="/notes/new/note" method="post">
		            <div class="modal-body">
	                    @csrf
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
		                <button type="submit" class="btn btn-primary">Simpan</button>
		            </div>
                </form>
	        </div>
	    </div>
	</div> 
	<div class="modal fade" id="alert-modal" data-bs-backdrop="static" data-bs-keyboard="false">
	    <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
		        <div class="modal-body">
		        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
		            <a class="btn btn-danger" href="javascript:void(0)">Hapus</a>
		        </div>
	        </div>
	    </div>
	</div> 
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">{{ $user->name }}</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse ms-auto" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						    Buat Baru
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#node-modal" data-bs-type="note">Catatan</button></li>
							<li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#node-modal" data-bs-type="folder">Folder</button></li>
						</ul>
					</li>
					<li class="nav-item">
					    <a class="nav-link" href="/logout">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
    @yield('content')
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script>
        const nodeModal = document.getElementById('node-modal');
        nodeModal.addEventListener('show.bs.modal', function(evt) {
            const triggerer = evt.relatedTarget;
            const type = triggerer.getAttribute('data-bs-type');
            
            const modalTitle = nodeModal.querySelector('.modal-title');
            const modalBody = nodeModal.querySelector('.modal-body');
            const form = nodeModal.querySelector('form');

            switch(type) {
                case 'note':
	                modalTitle.textContent = 'Buat Catatan Baru';
	                form.action = '/notes/new/note';
	                modalBody.innerHTML = `
	                    @csrf
	                    <input type="hidden" name="folder_id" value="{{ $currentFolder->id }}">
	                    <input type="hidden" name="user_id" value="{{ $user->id }}">
	                    <div class="mb-3">
	                        <label for="title" class="form-label">Judul Catatan</label>
	                        <input type="text" class="form-control" id="title" name="title" required>
	                    </div>
	                    <div class="mb-3">
	                        <label for="description" class="form-label">Deskripsi</label>
	                        <textarea id="description" class="form-control" name="description"></textarea>
	                    </div>
	                `;
                    break;
                case 'folder':
	                modalTitle.textContent = 'Buat Folder Baru';
	                form.action = '/notes/new/folder';
	                modalBody.innerHTML = `
	                    @csrf
	                    <input type="hidden" name="folder_id" value="{{ $currentFolder->id }}">
	                    <input type="hidden" name="user_id" value="{{ $user->id }}">
	                    <div class="mb-3">
	                        <label for="name" class="form-label">Nama Folder</label>
	                        <input type="text" class="form-control" id="name" name="name" required>
	                    </div>
	                    <div class="mb-3">
	                        <label for="description" class="form-label">Deskripsi</label>
	                        <textarea id="description" class="form-control" name="description"></textarea>
	                    </div>
	                `;
                    break;
                case 'edit-folder':
                    const folderFields = triggerer.getAttribute('data-fields').split('&');

                    modalTitle.textContent = 'Edit Folder';
                    form.action = '/notes/edit/folder';
	                modalBody.innerHTML = `
	                    @csrf
	                    <input type="hidden" name="folder_id" value="{{ $currentFolder->id }}">
	                    <input type="hidden" name="user_id" value="{{ $user->id }}">
	                    <input type="hidden" name="id" value="${ folderFields[0].split('=')[1] }">
	                    <div class="mb-3">
	                        <label for="name" class="form-label">Nama Folder</label>
	                        <input type="text" class="form-control" id="name" name="name" value="${ folderFields[1].split('=')[1] }">
	                    </div>
	                    <div class="mb-3">
	                        <label for="description" class="form-label">Deskripsi</label>
	                        <textarea id="description" class="form-control" name="description">${ folderFields[2].split('=')[1] }</textarea>
	                    </div>
	                `;
                    break;
                case 'edit-note':
                    const noteFields = triggerer.getAttribute('data-fields').split('&');

                    modalTitle.textContent = 'Edit info Catatan';
                    form.action = '/notes/edit/note';
	                modalBody.innerHTML = `
	                    @csrf
	                    <input type="hidden" name="folder_id" value="{{ $currentFolder->id }}">
	                    <input type="hidden" name="user_id" value="{{ $user->id }}">
	                    <input type="hidden" name="id" value="${ noteFields[0].split('=')[1] }">
	                    <div class="mb-3">
	                        <label for="title" class="form-label">Judul Catatan</label>
	                        <input type="text" class="form-control" id="title" name="title" value="${ noteFields[1].split('=')[1] }">
	                    </div>
	                    <div class="mb-3">
	                        <label for="description" class="form-label">Deskripsi</label>
	                        <textarea id="description" class="form-control" name="description">${ noteFields[2].split('=')[1] }</textarea>
	                    </div>
	                `;
                    break;
            }
        });

        const alertModal = document.getElementById('alert-modal');
        alertModal.addEventListener('show.bs.modal', function(evt) {
            const triggerer = evt.relatedTarget;

            const modalBody = alertModal.querySelector('.modal-body');
            const okButton = alertModal.querySelector('a');

            const message = triggerer.getAttribute('data-bs-message');
            const urlHref = triggerer.getAttribute('data-bs-href');

            modalBody.textContent = message;
            okButton.href = urlHref;
       });
    </script>
</body>
</html>
