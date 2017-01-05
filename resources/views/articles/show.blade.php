@extends('layouts.default')
@section('title',$article->title)

@section('content')
    <div class="container">
        <div class="section section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="title text-center">{{ $article->title }}</h1>
                    <h6 class="text-center">阅读次数:{{ $article->read_count }}</h6>
                    <p class="description">{{ $article->content }}</p>
                </div>
            </div>
        </div>
    </div>
@stop