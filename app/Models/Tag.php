<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getList()
    {
        return self::select(['id', 'name']);
    }

    public function getCurrentArticles($tagID)
    {
        $tag = self::findOrFail($tagID);
        return $tag->articles()->orderBy('created_at', 'desc');
    }
}
