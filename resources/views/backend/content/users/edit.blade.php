@extends('backend.main.main')

@section('page_header','用户信息')
@section('fa_icon','fa-user')
@section('page_level','用户')
@section('page_here','用户信息')
@section('page_content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <form role="form" action="{{ route('users.update',$user->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label for="userName">用户名</label>
                    <input type="text" class="form-control" id="userName" name="name" placeholder="用户名"
                           value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">E-Mail</label>
                    <input type="email" class="form-control" id="userEmail" name="email" placeholder="E-mail"
                           value="{{ $user->email }}" disabled>
                    <span class="help-block">E-Mail暂时不可修改</span>
                </div>
                <div id="form-group">
                    <label for="userAvatar">头像</label>
                    <img src="{{ $user->gravatar() }}"/>
                    <span>您可以在<a href="https://cn.gravatar.com/" target="_blank">Gravatar</a>修改您的资料图片。</span>
                </div>
                <br/>
                <div class="form-group">
                    <label for="userGender">性别</label>
                    <select class="form-control" id="userGender" name="gender">
                        <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>男</option>
                        <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>女</option>
                    </select>
                </div>
                <div id="form-group">
                    <label for="userDesc">签名</label>
                    <textarea class="form-control" id="userDesc" name="description">{{ $user->description }}</textarea>
                </div>
                <br/>
                <button type="submit" class="btn btn-success">保存</button>
            </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop