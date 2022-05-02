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

    public function index(Request $request, $folder_id) {
        $user = Auth::user();

        $currentFolder = Folder::find($folder_id);
        $folders = $currentFolder->folders()->latest()->get();
        $notes = $currentFolder->notes()->latest()->get();
        $parents = $currentFolder->getParents();

        session(['parent_dir' => '/' . $request->path()]);

        return view('notes.index', [
            'user' => $user,
            'currentFolder' => $currentFolder,
            'folders' => $folders,
            'notes' => $notes,
            'parents' => $parents
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
        $parent = session('parent_dir');

        return view('notes.edit', [
            'note' => $note,
            'parent' => $parent
        ]);
    }

    public function editNoteSave(Request $request, $note_id) {
        $note = Note::find($note_id);

        $note->title = $request->input('title');
        $note->content = $request->input('content') ?: '';

        $note->save();

        return "OK";
    }

    public function moveNodeRequest(Request $request, $type, $id) {
        if (request('canceled')) {
            $folderID = session('move_node')['source_dir_id'];
            $request->session()->forget('move_node');

            return redirect('/notes/' . $folderID);
        } 

        $node = null;
        $name = null;
        if ($type == "note") {
            $node = Note::find($id);
            $name = $node->title;
        } else {
            $node = Folder::find($id);
            $name = $node->name;
        }

        session(['move_node' => [
            'name' => $name,
            'id' => $id,
            'type' => $type,
            'source_dir_id' => request('source_dir_id')
        ]]);

        return redirect('/notes');
    }

    public function moveNode(Request $request) {
        $moveInfo = session('move_node');
        $node = null;
        if (session('move_node')['type'] == 'note') {
            $node = Note::find($moveInfo['id']);
        } else {
            $node = Folder::find($moveInfo['id']);
        }

        $node->folder_id = $request->get('target_id');
        $node->save();

        $request->session()->forget('move_node');
        return back();
    }
}
