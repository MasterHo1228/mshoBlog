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