@extends('layouts.default')
@section('title',$tag->name)

@section('content')
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="title"><i class="fa fa-tag"></i>&nbsp;{{ $tag->name }}</h2>
                    <div class="description" style="text-align: left !important;">
                        @include('articles.feed')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop