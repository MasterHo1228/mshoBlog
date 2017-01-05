@extends('backend.layout.default')

@section('content')
<div id="wrapper">
    @include('backend.main._header')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            @yield('page_content')
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
@stop