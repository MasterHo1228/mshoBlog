<div class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">低调君的黑科技研究室</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">主页</a></li>
                <li><a href="javascript:void(0)">帖子</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">种类
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">种类1</a></li>
                        <li><a href="javascript:void(0)">种类2</a></li>
                        <li><a href="javascript:void(0)">种类3</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">个人中心</a></li>
                            <li><a href="javascript:void(0)">编辑资料</a></li>
                            <li class="divider"></li>
                            <li>
                                <a id="signout" href="#">
                                    <form action="{{ route('signout') }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-block btn-danger" type="submit" name="button">登出</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="javascript:void(0)">登录</a></li>
                    <li><a href="{{ route('signup') }}">注册</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>