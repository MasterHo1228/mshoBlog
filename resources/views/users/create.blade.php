@extends('layouts.default')
@section('title','注册')

@section('content')
    @include('shared.errors')
    <div class="well bs-component">
        <form class="form-horizontal" method="post" action="{{ route('users.store') }}">
            {{ csrf_field() }}
            <fieldset>
                <legend>注册</legend>
                <div class="form-group">
                    <label for="inputUserName" class="col-md-2 control-label">用户名</label>

                    <div class="col-md-10">
                        <input type="text" class="form-control" id="inputUserName" name="name" placeholder="用户名"
                               value="{{ old('name') }}" required>
                    </div>
                </div>
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
                    <label for="inputPasswordT" class="col-md-2 control-label">确认密码</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="inputPasswordT" name="password_confirmation"
                               placeholder="确认密码" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">性别</label>

                    <div class="col-md-10">
                        <div class="radio radio-primary">
                            <label>
                                <input type="radio" name="gender" id="optionsRadios1" value="male" checked>
                                男
                            </label>
                        </div>
                        <div class="radio radio-primary">
                            <label>
                                <input type="radio" name="gender" id="optionsRadios2" value="female">
                                女
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