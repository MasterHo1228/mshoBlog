<li id="article-{{ $article->id }}">
    <span class="title">
        <a href="{{ route('articles.show',$article->id) }}">{{ $article->title }}</a>
        <small>(阅读次数:{{ $article->read_count }})</small>
    </span>
    <span class="content">{{ str_limit($article->content, $limit = 130, $end = '...') }}</span>
    <span class="timestamp">
        <i class="fa fa-calendar fa-fw"></i> {{ $article->created_at }}
    </span>
</li>