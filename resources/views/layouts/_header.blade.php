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
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">帖子
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">PHP</a></li>
                        <li><a href="javascript:void(0)">生活</a></li>
                        <li><a href="javascript:void(0)">其他</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <span class="input-group-addon">
			            <i class="fa fa-search"></i>
		            </span>
                    <input type="text" class="form-control" placeholder="搜索">
                </div>
            </form>
        </div>
    </div>
</nav>