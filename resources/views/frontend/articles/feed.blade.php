@if (count($feed_items))
    <ol class="articles">
        @foreach ($feed_items as $article)
            @include('frontend.articles._article_simple')
        @endforeach
    </ol>
    {!! $feed_items->render() !!}
@else
    <h5 class="description">暂无文章</h5>
@endif