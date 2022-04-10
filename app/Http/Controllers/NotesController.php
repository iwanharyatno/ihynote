<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Note;
use App\Models\Folder;

class NotesController extends Controller
{
    public function redirector() {
        $user = Auth::user();

        $userFolder = $user->folders()->firstWhere('name', $user->id . '-root');

        return redirect('/notes/' . $userFolder->id);
    }

    public function index($folder_id) {
        $user = Auth::user();

        $currentFolder = Folder::find($folder_id);
        $folders = $currentFolder->folders;
        $notes = $currentFolder->notes;

        return view('notes.index', [
            'user' => $user,
            'currentFolder' => $currentFolder,
            'folders' => $folders,
            'notes' => $notes
        ]);
    }

    public function newNode(Request $request, $type) {
        if ($type == 'note') {
            Note::create([
                'user_id' => $request->input('user_id'),
                'folder_id' => $request->input('folder_id'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'content' => ''
            ]);
        } else {
            Folder::create([
                'user_id' => $request->input('user_id'),
                'folder_id' => $request->input('folder_id'),
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);
        }

        return back();
    }

    public function editNode(Request $request, $type) {
        if ($type == 'note') {
            $note = Note::find($request->input('id'));
            $note->title = $request->input('title');
            $note->description = $request->input('description');
            $note->save();
        } else {
            $folder = Folder::find($request->input('id'));
            $folder->name = $request->input('name');
            $folder->description = $request->input('description');
            $folder->save();
        }

        return back();
    }

    public function deleteNode($type, $id) {
        if ($type == 'note') {
            $note = Note::find($id);
            $note->delete();
        } else {
            $folder = Folder::find($id);
            $folder->deleteRecursive();
        }

        return back();
    }

    public function editNote($note_id) {
        $note = Note::find($note_id);

        return view('notes.edit', [
            'note' => $note,
        ]);
    }

    public function editNoteSave(Request $request, $note_id) {
        $note = Note::find($note_id);

        $note->title = $request->input('title');
        $note->content = $request->input('content') ?: '';

        $note->save();

        return back()->with('message', 'Perubahan berhasil disimpan!');
    }
}
