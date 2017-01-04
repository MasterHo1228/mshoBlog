@extends('layouts.default')
@section('title', $user->name)

@section('pageType','profile-page')
@section('content')
    <div class="profile-content">
        <div class="container">
            @include('users._user_profile')
        </div>
    </div>
@stop