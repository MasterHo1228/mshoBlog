@extends('backend.layout.default')
@section('body_style','hold-transition skin-blue sidebar-mini')

@section('content')
    <div class="wrapper">
        @include('backend.main._header')
        @include('backend.main._sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @include('shared.message')
        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('page_header')
                    <small>@yield('page_header_desc')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa @yield('fa_icon')"></i> @yield('page_level')</a></li>
                    <li class="active">@yield('page_here')</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                @include('shared.errors')
                @yield('page_content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('backend.main._footer')
    </div>
    <!-- ./wrapper -->
@stop