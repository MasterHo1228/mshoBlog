<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTypes;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function create(){
        $types = ArticleTypes::all();
        return view('backend.content.articles.create',compact('types'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'type' => 'required',
            'content' => 'required'
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->type = $request->type;
        $article->content = $request->content;
        $article->save();

        session()->flash('success', '文章发布成功！');
        return redirect('/backyard/articles');
    }

    public function index()
    {
        $articles_list = Article::all();

        return view('backend.content.articles.index', compact('articles_list'));
    }
}
