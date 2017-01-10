<li id="article-{{ $article->id }}">
    <span class="title">
        <a href="{{ url('/articles',$article->id) }}">{{ $article->title }}</a>
        <small>(阅读次数:{{ $article->read_count }})</small>
    </span>
    <span class="content">{{ str_limit(strip_tags((new Parsedown())->text($article->content)), $limit = 130, $end = '...') }}</span>
    <span class="timestamp">
        <i class="fa fa-user fa-fw"></i> {{ $article->user->name }} &nbsp;&nbsp;
        <i class="fa fa-calendar fa-fw"></i> {{ $article->created_at }} &nbsp;&nbsp;
        <i class="fa fa-tags fa-fw"></i>
        @foreach($article->tags as $tag)
            <a href="#">{{ $tag->name }}</a>
        @endforeach
    </span>
</li>