@extends('layouts.default')
@section('title','登录')

@section('content')
    @include('shared.errors')
    <div class="well bs-component">
        <form class="form-horizontal" method="post" action="{{ route('signin') }}">
            {{ csrf_field() }}
            <fieldset>
                <legend>登录</legend>
                <div class="form-group">
                    <label for="inputEmail" class="col-md-2 control-label">Email</label>

                    <div class="col-md-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email"
                               value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-md-2 control-label">密码</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="密码"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox" name="remember"> 记住我
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-success">提交</button>
                        <button type="button" class="btn btn-default">取消</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@stop