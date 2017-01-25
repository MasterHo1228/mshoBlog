<li id="article-{{ $article->id }}">
    <span class="title">
        <a href="{{ route('frontend.articles.show',$article->id) }}">{{ $article->title }}</a>
        <small>(阅读次数:{{ $article->read_count }})</small>
    </span>
    <span class="content">{{ str_limit(strip_tags((new ParsedownExtra())->text($article->content)), $limit = 130, $end = '...') }}</span>
    <span class="timestamp">
        <i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;<a
                href="{{ route('frontend.users.profile',$article->user->id) }}">{{ $article->user->name }}</a> &nbsp;&nbsp;
        <i class="fa fa-calendar fa-fw"></i>&nbsp;&nbsp;{{ $article->created_at }} &nbsp;&nbsp;
        <i class="fa fa-tags fa-fw"></i>&nbsp;&nbsp;
        @foreach($article->tags as $tag)
            <a href="{{ route('frontend.tags.articles',$tag->id) }}">{{ $tag->name }}</a>
        @endforeach
    </span>
</li>