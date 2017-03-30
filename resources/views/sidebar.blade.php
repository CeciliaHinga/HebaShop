<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/pics/user5-128x128.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="/users/{{Auth::user()->id}}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ url()->current()==url('/admin')?'active':'' }}" ><a href="/admin"><span>Dashboard</span></a></li>
            <li class="treeview"><a href="#"><span>Roles</span><i class="caret pull-right"></i></a>
            <ul class="treeview-menu">
            <li class="{{ url()->current()==url('/admin/roles')?'active':'' }}" ><a href="{{route('roles.index') }}">View Roles</a></li>            
            <li class="{{ url()->current()==url('/admin/roles/createrole')?'active':'' }}" ><a href="{{route('roles.createrole') }}">New Roles</a></li>            
            </ul></li>
            <li class="treeview">
                <a href="#"><span>Permissions</span> <i class="caret pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('permissions.index') }}">View Permissions</a></li>
    <li><a href="{{route('permissions.create') }}">New Permission</a></li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><span>Users</span> <i class="caret pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('users') }}">View Users</a></li>
    <li><a href="{{route('users.create') }}">New Users</a></li> 
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>