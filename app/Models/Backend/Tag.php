<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function tagList()
    {
        return self::all()->pluck('name');
    }
}
