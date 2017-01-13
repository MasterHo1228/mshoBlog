<li id="article-{{ $result->id }}">
    <span class="title">
        <a href="{{ url('/articles',$result->id) }}">{{ $result->title }}</a>
    </span>
    <span class="content">{{ str_limit(strip_tags((new Parsedown())->text($result->content)), $limit = 130, $end = '...') }}</span>
</li>