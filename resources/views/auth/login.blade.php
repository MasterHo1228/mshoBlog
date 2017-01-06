@extends('backend.layout.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">登录</h3>
                    </div>
                    <div class="panel-body">
                        @include('shared.errors')
                        <form role="form" method="post" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ old('email') }}"
                                           autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="password" type="password"
                                           value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me"> 记住我
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">登录</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop