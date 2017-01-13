@extends('layouts.default')
@section('title', $user->name)

@section('pageType','profile-page')
@section('bg_image','/images/background/user_profile.jpg')
@section('content')
    <div class="profile-content">
        <div class="container">
            @include('users._user_profile')
            <div class="col-md-10 col-md-offset-1" style="/*text-align: left !important;*/">
                @include('articles.feed')
            </div>
        </div>
    </div>
@stop