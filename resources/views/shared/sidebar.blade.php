
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        @if (Auth::user())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Gravatar::src(Auth::user()->email) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/') }}"><i class="fa fa-circle-o"></i>Home</a></li>
                    <li><a href="{{ url('/actions') }}"><i class="fa fa-circle-o"></i>Actions</a></li>
                    <li><a href="{{ url('/historical') }}"><i class="fa fa-circle-o"></i>Historical</a></li>
                </ul>
            </li>
            <li><a href="https://github.com/brethash/raspberium/wiki" target="_blank"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li><a href="https://github.com/brethash/raspberium" target="_blank"><i class="fa fa-github"></i> <span>Raspberium Source</span></a></li>
        </ul>
        @endif
    </section>
    <!-- /.sidebar -->