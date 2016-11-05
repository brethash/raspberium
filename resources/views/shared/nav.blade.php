<ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->
    @if (Route::has('login'))
        @if(Auth::guest())
        <li>
            <a href="{{ url('/login') }}">Login</a>

        </li>
        @else

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ Gravatar::src(Auth::user()->email) }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{ Gravatar::src(Auth::user()->email) }}" class="img-circle" alt="User Image">

                    <p>
                        {{ Auth::user()->name }} - Guy Doing Stuff
                        <small>Member since Oct. 1985</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('/logout') }}"
                           class="btn btn-default btn-flat"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
        @endif
    @endif

</ul>