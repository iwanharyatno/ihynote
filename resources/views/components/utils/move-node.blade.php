<form action="/notes/move" method="POST">
@csrf
<input type="hidden" name="target_id" value="{{ $currentFolder->id }}">

<div class="card shadow-lg">
    <div class="card-body d-flex justify-content-center">
        <p class="card-text">Pindahkan <strong>{{ session('move_node')['name'] }}</strong> ke...</p>
    </div>
</div>

<div class="card position-fixed bottom-0 shadow-lg w-100" style="z-index: 2">
    <div class="card-body d-flex align-items-center justify-content-between">
        <p class="card-text m-0">{{ $currentFolder->name }} &raquo; {{ session('move_node')['name'] }}</p>
        <div>
            <a class="btn btn-secondary" href="/notes/move/{{ session('move_node')['type'] }}/{{ session('move_node')['id'] }}?canceled=true" type="button">Batal</a>
            <button class="btn btn-primary" type="submit">Konfirmasi</button>
        </div>
    </div>
</div>
</form>
