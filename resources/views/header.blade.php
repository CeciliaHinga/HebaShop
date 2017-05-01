<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
@if (Entrust::hasRole('Admin'))
<a href="{{ url('/admin') }}" class="logo"><span class="logo-lg"><img src="/pics/h.jpg" height="30" width="41"></span></a>
@elseif (Entrust::hasRole('Shopkeeper'))
<a href="{{ url('/owners') }}" class="logo navbar-static-top"><span class="logo-lg"><img src="/pics/h.jpg" height="30" width="41"><span></a>
@else
<a href="{{ url('/customers') }}" class="logo navbar-fixed-top"><span class="logo-lg"><img src="/pics/h.jpg" height="30" width="41"></span></a>
@endif


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="javascript:void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <li><a href="/">View Site</a></li>
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            @if(!Auth::user()->name || !Auth::user()->image_extension)
                                            <img class="label-danger img-circle" alt="No Avatar"/>
                                            @else
                                            <img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . Auth::user()->name. '.' . Auth::user()->image_extension . '?'. 'time='. time() }}" class="img-circle" alt="User Image"/>
                                        @endif
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li><!-- end message -->
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li><!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                                            @if(!Auth::user()->name || !Auth::user()->image_extension)
                                            <img class="label-danger img-circle" alt="No Avatar"/>
                                            @else
                                            <img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . Auth::user()->name. '.' . Auth::user()->image_extension . '?'. 'time='. time() }}" class="user-image img-circle" alt="User Image"/>
                                        @endif
                                                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                                            @if(!Auth::user()->name || !Auth::user()->image_extension)
                                            <img class="label-danger img-circle" alt="No Avatar"/>
                                            @else
                                            <img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . Auth::user()->name. '.' . Auth::user()->image_extension . '?'. 'time='. time() }}" class="img-circle" alt="User Image"/>
                                        @endif
                                                                    <p>
                                {{ Auth::user()->name }} - @foreach (Auth::user()->roles as $role) {{ $role->display_name }}@endforeach 
                                <small>Member since {{ Auth::user()->created_at->format('j F, Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                           @if (Entrust::hasRole('Admin'))
                            <div class="col-xs-4 text-center">
                                <a href="{{route('users') }}">Users</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="{{route('permissions.index') }}">Permissions</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="{{route('roles.index') }}">Roles</a>
                            </div>
                            @elseif (Entrust::hasRole('Shopkeeper'))
                            <div class="col-xs-4 text-center">
                                <a href="{{route('users') }}">Customers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <!-- <a href="{{route('permissions.index') }}">Products</a> -->
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="{{route('orders.print') }}">Sales</a>
                            </div>
                            @else
                            <div class="col-xs-4 text-center">
                                <a href="{{route('shops.home')}}">Shops</a>
                            </div>
<!--                             <div class="col-xs-4 text-center">
                                <a href="{{route('permissions.index') }}">Purchases</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="{{route('roles.index') }}">Followers</a>
                            </div>
 -->                            @endif
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/users/{{Auth::user()->id}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="/auth/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>