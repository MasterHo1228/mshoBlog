<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['title', 'content'];

    public function getLatestArticles($limit = 8)
    {
        return $this->select(['id', 'title', 'content', 'created_at'])->orderBy('id', 'DESC')->paginate($limit);
    }
}
