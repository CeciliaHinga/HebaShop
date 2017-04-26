<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
                <a href="/users/{{Auth::user()->id}}">
                <div class="user-panel">
            <div class="pull-left image">
                                            @if(!Auth::user()->name || !Auth::user()->image_extension)
                                            <img class="label-danger img-circle" alt="No Avatar"/>
                                            @else
                                            <img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . Auth::user()->name. '.' . Auth::user()->image_extension . '?'. 'time='. time() }}" class="img-circle" alt="User Image"/>
                                        @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
<i class="fa fa-circle text-success"></i> Online
            </div>
        </div></a>

        <!-- search form (Optional) -->
        <form action="/" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="search" name="query" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
@if (Entrust::hasRole('Admin'))
            <li class="{{ url()->current()==url('/admin')?'active':'' }}" ><a href="/admin"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href="javascript:void(0)"><i class="fa fa-users"></i><span>Users</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li ><a href="{{route('users') }}"><i class="fa fa-circle-o"></i><span>Users</span></a></li>            
            <li ><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>New Users</span></a></li>            
            </ul></li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-expeditedssl"></i><span>Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('permissions.index') }}"><i class="fa fa-circle-o"></i><span>My Permissions</span></a></li>
    <li><a href="{{route('permissions.create') }}"><i class="fa fa-circle-o"></i><span>New Permission</span></a></li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-check-square"></i><span>Roles</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('roles.index') }}"><i class="fa fa-circle-o"></i><span>View Roles</span></a></li>
    <li><a href="{{route('roles.newrole')}}"><i class="fa fa-circle-o"></i><span>New Roles</span></a></li> 
                </ul>
            </li>
<li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-cogs"></i><span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{ route('users.show',Auth::user()->id)}}"><i class="fa fa-circle-o"></i><span>Profile</span></a></li>
    <!-- <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>Shops</span></a></li>  -->
                </ul>
            </li>
@elseif(Entrust::hasRole('Shopkeeper'))
            <li class="{{ url()->current()==url('/customers')?'active':'' }}" ><a href="/owners"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href="javascript:void(0)"><i class="fa fa-home"></i> <span>Shops</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li ><a href="{{route('advertisement.index') }}"><i class="fa fa-circle-o"></i><span>New Shop</span></a></li>            
            <li ><a href="{{url('/advertisement/create') }}"><i class="fa fa-circle-o"></i><span>My Shops</span></a></li>            
            </ul></li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-list"></i><span>Sales</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li></i><a href="{{route('permissions.index') }}"><i class="fa fa-circle-o"></i><span>My Sales</span></a></li>
    <li></i><a href="{{route('advertisement.cart') }}"><i class="fa fa-circle-o"></i><span>Carts</span></a></li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-circle-o"></i><span>Products</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('users') }}"><i class="fa fa-circle-o"></i><span>View Products</span></a></li>
    <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>New Products</span></a></li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-users"></i><span>Customers</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('users') }}"><i class="fa fa-circle-o"></i><span>View Customers</span></a></li>
    <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>New Customers</span></a></li> 
                </ul>
            </li>
<li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-cog"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i>
</a>
                <ul class="treeview-menu">
    <li><a href="{{ route('users.show',Auth::user()->id)}}"><i class="fa fa-circle-o"></i><span>Profile</span></a></li>
    <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>Manage Products</span></a></li> 
    <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>Manage Customers</span></a></li> 
                </ul>
            </li>
@else
            <li class="{{ url()->current()==url('/customers')?'active':'' }}" ><a href="/customers"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href="javascript:void(0)"><i class="fa fa-home"></i><span>Shops</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            <li><a href="{{route('advertisement.index') }}"><i class="fa fa-circle-o"></i><span>New Shop</span></a></li>            
            <li><a href="{{url('/advertisement/create') }}"><i class="fa fa-circle-o"></i><span>My Shops</span></a></li>            
            </ul></li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-th"></i><span>Purchases</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('permissions.index') }}"><i class="fa fa-circle-o"></i><span>My Purchases</span></a></li>
    <li><a href="{{route('advertisement.cart') }}"><i class="fa fa-circle-o"></i><span>Cart</span></a></li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-users"></i><span>Followers</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('users') }}"><i class="fa fa-circle-o"></i><span>View Users</span></a></li>
    <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>New Users</span></a></li> 
                </ul>
            </li>
<li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-cog"></i><span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{ route('users.show',Auth::user()->id)}}"><i class="fa fa-circle-o"></i><span>Profile</span></a></li>
    <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>Shops</span></a></li> 
                </ul>
            </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>