@extends('frontend.layouts.default')
@section('title',$searchKey)

@section('content')
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="title"><i class="fa fa-search"></i>&nbsp;{{ $searchKey }}</h2>
                    <div class="description" style="text-align: left !important;">
                        @include('frontend.articles.results')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop