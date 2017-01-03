@extends('layouts.default')
@section('title', '主页')
@section('pageType','landing-page')
@section('bg_image','https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450')

@section('content')
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">Let's talk product</h2>
                    <h5 class="description">This is the paragraph where you can write more details about your product.
                        Keep you user engaged by providing meaningful information. Remember that by this time, the user
                        is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see
                        more.</h5>
                </div>
            </div>
        </div>
    </div>
@stop