<?php

namespace App\Http\Controllers;

use App\Models\Article;

class StaticPagesController extends Controller
{
    public function home(){
        $feed_items = Article::getLatestArticles();

        return view('frontend.static_pages.home', compact('feed_items'));
    }

    public function about(){
        return view('frontend.static_pages.about');
    }
}
