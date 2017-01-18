<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use TomLingham\Searchy\Facades\Searchy;

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

        $Parsedown = new \ParsedownExtra();
        $article_content = $Parsedown->text($article->content);

        return view('frontend.articles.show', compact('article', 'article_content'));
    }

    public function search(Request $request)
    {
        $searchKey = $request->key;
        $results = Searchy::articles(['title', 'content'])->query($searchKey)->get();
        return view('frontend.articles.search', compact('results', 'searchKey'));
    }
}
