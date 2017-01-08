<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Article;
use App\Models\Backend\ArticleTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//        $article = new Article();
//        $article->title = $request->title;
//        $article->type = $request->type;
//        $article->content = $request->content;
//        $article->save();
        Auth::user()->articles()->create([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->content,
        ]);

        session()->flash('success', '文章发布成功！');
        return redirect('/backyard/articles');
    }

    public function index()
    {
        $articles = new Article();
        $articles_list = $articles->getCurrentUserArticles();

        return view('backend.content.articles.index', compact('articles_list'));
    }

    public function edit($id)
    {

    }
}
