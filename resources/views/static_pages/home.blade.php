@extends('layouts.default')
@section('title', '主页')
@section('pageType','landing-page')
@section('bg_image','/images/background/home-header.jpg')

@section('content')
    <div class="container">
        <div class="section section-landing">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @include('articles.feed')
                </div>
            </div>
        </div>
    </div>
@stop