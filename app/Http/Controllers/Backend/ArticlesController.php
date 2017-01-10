<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Article;
use App\Models\Backend\Tag;
use App\Models\Backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function create(){
        return view('backend.content.articles.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'tags' => ['required', 'regex:/^\w+$|^(\w+,)+\w+$/'],
            'content' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = Auth::id();
        $article->save();

        $tags = explode(',', $request->tags);
        foreach ($tags as $tagName) {
            $tag = Tag::whereName($tagName)->first();
            if (!$tag) {
                $tag = Tag::create(array('name' => $tagName));
            }
            $tag->count++;
            $article->tags()->save($tag);
        }

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
        $article = Article::with('tags')->findOrFail($id);
        $tags = '';
        for ($i = 0, $len = count($article->tags); $i < $len; $i++) {
            $tags .= $article->tags[$i]->name . ($i == $len - 1 ? '' : ',');
        }
        $article->tags = $tags;

        return view('backend.content.articles.edit', compact('article'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'tags' => ['required', 'regex:/^\w+$|^(\w+,)+\w+$/'],
            'content' => 'required'
        ]);

        $tags = array_unique(explode(',', $request->tags));

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = Auth::id();
        $article->save();

        foreach ($article->tags as $tag) {
            if (($index = array_search($tag->name, $tags)) !== false) {
                unset($tags[$index]);
            } else {
                $tag->count--;
                $tag->save();
                $article->tags()->detach($tag->id);
            }
        }
        foreach ($tags as $tagName) {
            $tag = Tag::whereName($tagName)->first();
            if (!$tag) {
                $tag = Tag::create(array('name' => $tagName));
            }
            $tag->count++;
            $article->tags()->save($tag);
        }

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
