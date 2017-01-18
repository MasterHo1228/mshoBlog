@if (count($results))
    <ol class="articles">
        @foreach ($results as $result)
            @include('frontend.articles._result_item')
        @endforeach
    </ol>
@else
    <h5 class="description">无结果</h5>
@endif