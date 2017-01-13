<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::select(['id', 'name', 'count', 'created_at'])->get();
        return view('backend.content.tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags|max:35',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;

        $response = 'false';
        if ($tag->save()) {
            $response = 'true';
        }

        return response()->json(['response' => $response]);
    }

    public function info($id)
    {
        $tag = Tag::find($id);
        return response()->json([
            'id' => $id,
            'name' => $tag->name
        ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags|max:35',
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;

        $response = 'false';
        if ($tag->save()) {
            $response = 'true';
        }

        return response()->json(['response' => $response]);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        foreach ($tag->articles as $article) {
            $tag->articles()->detach($article->id);
        }

        $response = 'false';
        if ($tag->delete()) {
            $response = 'true';
        }
        return response()->json(['response' => $response]);
    }
}
