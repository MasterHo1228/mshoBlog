@extends('backend.layout.default')
@section('external_css')
    <style type="text/css">
        .flashy {
            font-family: Arial, sans-serif;
            padding: 11px 30px;
            border-radius: 4px;
            font-weight: 600;
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-size: 16px;
            color: #fff;
            z-index: 9999999;
        }

        .flashy--success {
            background-color: #99c93d;
            color: #fff;
        }

        .flashy--warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
        }

        .flashy--muted {
            background: #eee;
            color: #3a3a3a;
            border: 1px solid #e2e2e2;
        }

        .flashy--muted-dark {
            background: #133259;
            color: #e2e1e7;
        }

        .flashy--info a,
        .flashy--primary-dark a {
            color: #fff;
        }

        .flashy--error {
            background: #d14130;
            color: #fff;
        }

        .flashy--primary {
            background: #573e81;
        }

        .flashy--primary-dark {
            background: linear-gradient(to right, #133259 30%, #0d233e);
        }

        .flashy--info {
            background: #00baf3;
        }

        .flashy > ul {
            padding-left: 15px;
        }

        .flashy > p:only-of-type {
            margin-bottom: 0;
        }

        .flashy i {
            margin-right: 8px;
            position: relative;
            top: 6px;
        }

        .flashy .flashy__body {
            color: inherit;
        }

        @media only screen and (max-width: 1050px) {
            .flashy {
                text-align: center;
                right: 0;
                left: 50%;
                width: 300px;
                margin-left: -150px;
            }
        }
    </style>
@stop
@section('body_style','hold-transition skin-blue sidebar-mini')

@section('content')
    <div class="wrapper">
        @include('backend.main._header')
        @include('backend.main._sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
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
                @yield('page_content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('backend.main._footer')
    </div>
    <!-- ./wrapper -->
@stop