<div class="header header-filter"
     style="background-image: url(@yield('bg_image','/images/background/list_detail.jpg'));">
    @include('shared.message')
    @if(Request::is('/'))
        @include('static_pages._index_header')
    @elseif(Request::is('signup'))
        @include('users._signup')
        @include('layouts._footer')
    @elseif(Request::is('signin'))
        @include('sessions._signin')
        @include('layouts._footer')
    @endif
</div>