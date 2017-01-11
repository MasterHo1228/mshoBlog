<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getLatestArticles($limit = 8)
    {
        return self::with('user', 'tags')->orderBy('created_at', 'desc')->paginate($limit);
    }

    public function getMostPopularArticles($limit = 5)
    {
        return self::with('user', 'tags')->orderBy('read_count', 'desc')->paginate($limit);
    }
}
