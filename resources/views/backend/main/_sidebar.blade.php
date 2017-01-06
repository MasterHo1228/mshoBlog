<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->gravatar() }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('backyard') }}"><i class="fa fa-home"></i> <span>首页</span></a></li>
            <li><a href="#">
                    <i class="fa fa-th-list"></i><span>文章</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('backyard/article/create') }}"><i class="fa fa-plus"></i> 写文章</a></li>
                    <li><a href="#"><i class="fa fa-list-alt"></i> 文章管理</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-tags"></i> <span>种类</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>