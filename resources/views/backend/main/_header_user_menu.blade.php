<!-- User Account Menu -->
<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="{{ Auth::user()->gravatar() }}" class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">{{ Auth::user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
            <img src="{{ Auth::user()->gravatar() }}" class="img-circle" alt="User Image">

            <p>
                {{ Auth::user()->name }}
                <small>{{ Auth::user()->description }}</small>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{ route('users.edit',Auth::id()) }}" class="btn btn-default btn-flat">个人资料</a>
            </div>
            <div class="pull-right">
                <form action="{{ route('backend.logout') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-default btn-flat">登出</button>
                </form>
            </div>
        </li>
    </ul>
</li>