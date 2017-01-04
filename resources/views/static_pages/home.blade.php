@extends('layouts.default')
@section('title', '主页')
@section('pageType','landing-page')
@section('bg_image','https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450')

@section('content')
    <div class="container">
        <div class="section section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include('articles.feed')
                </div>
            </div>
        </div>
    </div>
@stop