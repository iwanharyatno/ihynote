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
}
