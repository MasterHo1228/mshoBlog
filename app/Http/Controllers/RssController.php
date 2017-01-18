<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Moell\Rss\Rss;

class RssController extends Controller
{
    public function index()
    {
        $channel = [
            'title' => 'mshoBlog',
            'link' => 'http://masterho1228.xyz',
            'description' => 'This is mshoBlog RSS feed',
            'category' => [
                'value' => 'blog',
                'attr' => [
                    'domain' => 'masterho1228.xyz'
                ]
            ]
        ];

        $rss = new Rss();
        $rssChannel = $rss->channel($channel);

        $articles = Article::select(['id', 'title', 'content'])->get();
        $Parsedown = new \ParsedownExtra();
        $items = [];

        foreach ($articles as $article) {
            $item = [
                'title' => $article->title,
                'description' => '<![CDATA[' . $Parsedown->text($article->content) . ']]>',
                'source' => [
                    'value' => $article->title,
                    'attr' => [
                        'url' => action('ArticlesController@show', [$article->id])
                    ]
                ]
            ];
            $items[] = $item;
            $rss->item($item);
        }

        return response($rssChannel, 200, ['Content-Type' => 'text/xml']);
    }
}
