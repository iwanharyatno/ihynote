<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        'user_id',
        'name',
        'description'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function folders() {
        return $this->hasMany(Folder::class);
    }

    public function folder() {
        return $this->belongsTo(Folder::class);
    }

    public function notes() {
        return $this->hasMany(Note::class);
    }

    public function deleteRecursive() {
        $childFolders = $this->folders;
        $childNotes = $this->notes;

        foreach ($childFolders as $childFolder) {
            $childFolder->deleteRecursive();
        }

        foreach ($childNotes as $childNote) {
            $childNote->delete();
        }

        $this->delete();
    }

    public function getParents() {
        $parent = $this->folder;

        if ($parent) {
            $parents = $parent->getParents();
            $parents[] = $this;
            return $parents;
        } else {
            return [$this];
        }
    }
}
