@if(!Request::is('signup') && !Request::is('signin'))
    <div class="main main-raised">
        @yield('content')
    </div>
    @include('layouts._footer')
@endif
