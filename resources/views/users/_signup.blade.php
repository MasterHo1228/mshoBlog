<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
            <div class="card card-signup">
                <form class="form" method="post" action="{{ route('users.store') }}">
                    {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <h4>注册</h4>
                    </div>
                    <div class="content">
                        @include('shared.errors')
                        <div class="form-group">
                            <label for="inputUserName" class="col-md-2 control-label">用户名</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="inputUserName" name="name" placeholder="用户名"
                                       value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-md-2 control-label">E-mail</label>

                            <div class="col-md-10">
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                       placeholder="E-Mail"
                                       value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-md-2 control-label">密码</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="inputPassword" name="password"
                                       placeholder="密码"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordT" class="col-md-2 control-label">确认密码</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="inputPasswordT"
                                       name="password_confirmation"
                                       placeholder="确认密码"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">性别</label>

                            <div class="col-md-10">
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="gender" value="male" checked>
                                        男
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="gender" value="female">
                                        女
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
