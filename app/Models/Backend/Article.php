<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAllArticles()
    {
        return $this->select(['id', 'title', 'type', 'read_count', 'content', 'created_at'])->orderBy('id', 'DESC');
    }

    public function getCurrentUserArticles()
    {
        $user = User::findOrFail(Auth::user()->id);
        return $user->articles()->orderBy('created_at', 'desc')->paginate(30);
    }
}
