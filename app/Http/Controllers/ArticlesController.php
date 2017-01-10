<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create', 'edit', 'update', 'store', 'destroy']
        ]);
    }

    public function show($id)
    {
        $article = Article::with('user', 'tags')->findOrFail($id);
        $article->read_count = $article->read_count + 1;
        $article->save();

        $Parsedown = new \Parsedown();
        $article_content = $Parsedown->text($article->content);

        return view('articles.show', compact('article', 'article_content'));
    }
}
