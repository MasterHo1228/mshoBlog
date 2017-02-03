<div class="header header-filter"
     style="background-image: url(@yield('bg_image','/images/background/list_detail.jpg'));">
    @if(Request::is('/'))
        @include('frontend.static_pages._index_header')
    @elseif(Request::is('signup'))
        @include('frontend.users._signup')
    @elseif(Request::is('signin'))
        @include('frontend.sessions._signin')
    @endif
</div>