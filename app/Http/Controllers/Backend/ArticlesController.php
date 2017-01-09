<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Article;
use App\Models\Backend\ArticleTypes;
use App\Models\Backend\User;
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
        $article = Article::findOrFail($id);
        $types = ArticleTypes::all();
        return view('backend.content.articles.edit', compact('article', 'types'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'content' => 'required'
        ]);

        $article = Article::findOrFail($id);
        $data = array_filter([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->content,
        ]);
        $article->update($data);

        session()->flash('success', '文章更新成功！');
        return redirect('backyard/articles');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if (User::findOrFail(Auth::id())->can('destroy', $article)) {
            return response()->json(['response' => 'true']);
        } else {
            return false;
        }
    }

    public function show($id, Request $request)
    {
        if ($request->isMethod('get')) {
            $article = new Article();
            $Parsedown = new \Parsedown();
            $content = $Parsedown->text($article->getPreviewContentById($id));

            return response()->json(['data' => $content]);
        }
    }
}
