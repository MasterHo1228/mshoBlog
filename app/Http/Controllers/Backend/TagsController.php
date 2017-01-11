<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::select(['id', 'name', 'count', 'created_at'])->get();
        return view('backend.content.tags.index', compact('tags'));
    }

    public function store()
    {

    }

    public function info()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
