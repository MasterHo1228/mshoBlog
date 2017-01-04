@if (count($feed_items))
    <ol class="articles">
        @foreach ($feed_items as $article)
            @include('articles._article_simple')
        @endforeach
        {!! $feed_items->render() !!}
    </ol>
@endif