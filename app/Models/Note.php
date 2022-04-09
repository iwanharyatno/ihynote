<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        'user_id',
        'title',
        'description',
        'content'
    ];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function folder() {
        $this->belongsTo(Folder::class);
    }
}
