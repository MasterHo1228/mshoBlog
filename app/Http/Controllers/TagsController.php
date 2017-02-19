<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $feed_items = $tag->articles()->orderBy('created_at', 'desc')->paginate(15);
        return view('frontend.tags.show', compact('tag', 'feed_items'));
    }
}
