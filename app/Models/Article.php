<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    public function getAllArticles()
    {
        return $this->select(['id', 'title', 'type', 'read_count', 'content', 'created_at'])->orderBy('id', 'DESC');
    }

    public function getLatestArticles($limit = 8)
    {
        return $this->select(['id', 'title', 'type', 'read_count', 'content', 'created_at'])->orderBy('id', 'DESC')->paginate($limit);
    }

    public function getMostPopularArticles($limit = 5)
    {
        return $this->select(['id', 'title', 'type', 'read_count', 'content', 'created_at'])->orderBy('read_count', 'DESC')->paginate($limit);
    }
}
