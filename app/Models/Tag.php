<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public static function fullList()
    {
        return self::select(['id', 'name']);
    }

    public static function tagsNameList()
    {
        return self::all()->pluck('name');
    }

    public static function getCurrentArticles($tagID)
    {
        $tag = self::find($tagID);
        return $tag->articles()->orderBy('created_at', 'desc');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
