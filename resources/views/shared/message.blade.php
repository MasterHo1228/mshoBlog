@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has($msg))
        <div class="alert alert-{{ $msg }} alert-fixed">
            <button href="#" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get($msg) }}
        </div>
    @endif
@endforeach