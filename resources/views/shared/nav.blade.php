<ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->
    @if (Route::has('login'))
        @if(!Auth::user())
        <li>
            <a href="{{ url('/login') }}">Login</a>

        </li>
        @else

        <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <li><!-- start message -->
                            <a href="#">
                                <div class="pull-left">
                                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                    Support Team
                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                </h4>
                                <p>Why not buy a new awesome theme?</p>
                            </a>
                        </li>
                        <!-- end message -->
                    </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <li>
                            <a href="#">
                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
            </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <li><!-- Task item -->
                            <a href="#">
                                <h3>
                                    Design some buttons
                                    <small class="pull-right">20%</small>
                                </h3>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- end task item -->
                    </ul>
                </li>
                <li class="footer">
                    <a href="#">View all tasks</a>
                </li>
            </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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