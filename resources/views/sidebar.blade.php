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
                <a href="javascript:void(0)"><i class=""></i><span>Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('permissions.index') }}"><i class="fa fa-circle-o"></i><span>My Permissions</span></a></li>
    <li><a href="{{route('permissions.create') }}"><i class="fa fa-circle-o"></i><span>New Permission</span></a></li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-th"></i><span>Roles</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{route('roles.index') }}"><i class="fa fa-circle-o"></i><span>View Roles</span></a></li>
    <li><a href="{{route('roles.create') }}"><i class="fa fa-circle-o"></i><span>New Roles</span></a></li> 
                </ul>
            </li>
<li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-cog"></i><span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
    <li><a href="{{ route('users.edit',Auth::user()->id)}}"><i class="fa fa-circle-o"></i><span>Profile</span></a></li>
    <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>Shops</span></a></li> 
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
    <li></i><a href="{{route('permissions.create') }}"><i class="fa fa-circle-o"></i><span>Carts</span></a></li> 
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
    <li><a href="{{ route('users.edit',Auth::user()->id)}}"><i class="fa fa-circle-o"></i><span>Profile</span></a></li>
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
    <li><a href="{{route('permissions.create') }}"><i class="fa fa-circle-o"></i><span>Cart</span></a></li> 
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
    <li><a href="{{ route('users.edit',Auth::user()->id)}}"><i class="fa fa-circle-o"></i><span>Profile</span></a></li>
    <li><a href="{{route('users.create') }}"><i class="fa fa-circle-o"></i><span>Shops</span></a></li> 
                </ul>
            </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>