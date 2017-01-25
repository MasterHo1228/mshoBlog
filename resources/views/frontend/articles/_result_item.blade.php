<li id="article-{{ $result->id }}">
    <span class="title">
        <a href="{{ route('frontend.articles.show') }}">{{ $result->title }}</a>
    </span>
    <span class="content">{{ str_limit(strip_tags((new ParsedownExtra())->text($result->content)), $limit = 130, $end = '...') }}</span>
</li>