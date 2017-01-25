@extends('frontend.layouts.default')
@section('title','关于')

@section('bg_image','/images/background/about.jpg')
@section('content')
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">关于</h2>
                    <p class="description">
                        <b>mshoBlog</b>
                        <small>Version:0.1 alpha</small>
                        <br/><br/>
                        该博客网站基于Laravel 5.4开发<br/>
                        网站GitHub开源地址:<a href="https://github.com/MasterHo1228/mshoBlog" target="_blank">https://github.com/MasterHo1228/mshoBlog</a><br/>
                        E-Mail:<a href="mailto:masterho1228@gmail.com">masterho1228@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop