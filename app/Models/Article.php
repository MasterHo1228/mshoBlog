<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getLatestArticles($limit = 8)
    {
        return self::orderBy('created_at', 'desc')->paginate($limit);
    }

    public function getMostPopularArticles($limit = 5)
    {
        return self::orderBy('read_count', 'desc')->paginate($limit);
    }
}
