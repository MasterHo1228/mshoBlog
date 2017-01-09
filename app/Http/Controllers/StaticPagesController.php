<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class StaticPagesController extends Controller
{
    public function home(){
        $articles = new Article();
        $feed_items = $articles->getLatestArticles();
        $tags = (new Tag())->getList();

        return view('static_pages.home', compact('feed_items', 'tags'));
    }

    public function about(){
        return view('static_pages.about');
    }
}
