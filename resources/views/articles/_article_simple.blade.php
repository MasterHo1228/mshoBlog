<li id="article-{{ $article->id }}">
    <span class="title">
        <a href="#">{{ $article->title }}</a>
    </span>
    <span class="content">{{ str_limit($article->content, $limit = 130, $end = '...') }}</span>
    <span class="timestamp">
        <i class="fa fa-calendar fa-fw"></i> {{ $article->created_at }}
    </span>
</li>