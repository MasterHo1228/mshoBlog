<?php

namespace App\Http\Controllers;

use App\Models\Articles;

class StaticPagesController extends Controller
{
    public function home(){
        $articles = new Articles();
        $feed_items = $articles->getLatestArticles();
        return view('static_pages.home', compact('feed_items'));
    }

    public function about(){
        return view('static_pages.about');
    }
}
