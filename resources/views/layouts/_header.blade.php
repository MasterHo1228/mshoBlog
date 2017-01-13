<nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">低调君的黑科技研究室</a>
        </div>

        <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 标签 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('tags.show',1) }}">PHP</a></li>
                        <li><a href="{{ route('tags.show',2) }}">Life</a></li>
                        <li><a href="{{ route('tags.show',3) }}">Others</a></li>
                    </ul>
                </li>
            </ul>

            <form class="navbar-form navbar-left" method="get" action="{{ route('search') }}">
                <div class="input-group">
                    <span class="input-group-addon">
			            <i class="fa fa-search"></i>
		            </span>
                    <input type="text" class="form-control" name="key" placeholder="搜索">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('users.show',Auth::user()->id) }}">个人主页</a></li>
                            <li><a href="{{ url('/backyard') }}" target="_blank">博客管理</a></li>
                            <li class="divider"></li>
                            <li>
                                <a id="logout" href="#">
                                    <form action="{{ route('signout') }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-block btn-danger" type="submit" name="button">登出</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('signin') }}">登录</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>