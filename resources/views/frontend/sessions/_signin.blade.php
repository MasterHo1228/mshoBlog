<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
            <div class="card card-signup">
                <form class="form" method="post" action="{{ route('frontend.signin') }}">
                    {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <h4>登录</h4>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                       placeholder="E-Mail"
                                       value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="inputPassword" name="password"
                                       placeholder="密码"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-12">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" name="remember"> 记住我
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">登录</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
