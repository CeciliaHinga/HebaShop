<!DOCTYPE html>
<html lang="en">
<head>
  <title>Heba&nbsp;:&nbsp;@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {!!Html::style('css/bootstrap.min.css')!!}
{!!Html::style('css/font-awesome.min.css')!!}
{!!Html::style('css/bootstrap-social.css')!!}
{!!Html::style('css/bootstrap-theme.min.css')!!}
{!!Html::style('css/mystyles.css')!!}
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<a class="navbar-brand" href="{{ url('/') }}"><img src="/pics/h.jpg" height="30" width="41"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<li class="active"><a href="/admin">Dashboard</a></li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle bg-4" data-toggle="dropdown">Roles<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('roles') }}">View Roles</a></li>
    <li><a href="{{route('roles.createrole') }}">New Role</a></li> 
  </ul> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle bg-4" data-toggle="dropdown">Permission<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('permissions.index') }}">View Permissions</a></li>
    <li><a href="{{route('permissions.create') }}">New Permission</a></li> 
  </ul> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle bg-4" data-toggle="dropdown">Users<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('users') }}">View Users</a></li>
    <li><a href="{{route('users.create') }}">New Users</a></li> 
  </ul> </li>   <li class="{{ Request::path() == '/' ? 'active' : '' }}"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
<li  class="{{ Request::path() == '/advertisement' ? 'active' : '' }}" ><a href="{{ url('/advertisement') }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Advertise</a></li>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Categories<span class="caret"></span></a><ul class="dropdown-menu">
<li class="{{ Request::path() == '/categories/1' ? 'active' : '' }}"><a href="{{ url('/categories/1') }}" class="dropdown-header">Appliances</a><li role="separator" class="divider"></li>
<li><a href="/types/1">Toys</a></li>
<li><a href="/types/2">Electronics</a></li>
</li><li role="separator" class="divider"></li>
<li><a href="/categories/2" class="dropdown-header">Real Estates</a><li role="separator" class="divider"></li>
<li><a href="/types/3">Land</a></li>
<li><a href="/types/4">Mortgages</a></li>
</li><li role="separator" class="divider"></li>
<li><a href="/categories/3" class="dropdown-header">Jobs</a><li role="separator" class="divider"></li>
<li><a href="/types/5">Blue Collar</a></li>
<li><a href="/types/6">White Collar</a></li>
</li><li role="separator" class="divider"></li>
<li><a href="/categories/4" class="dropdown-header">Vehicles</a><li role="separator" class="divider"></li>
<li><a href="/types/7">Bikes</a></li>
<li><a href="/types/8">Cars</a></li>
</li>
</ul>
</li>
<li><a href="aboutus.html"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>About</a></li> 
<li><a href="contactus.html"><span class="fa fa-envelope-o">Contact</span></a></li>
</ul>

<ul class="nav navbar-nav navbar-right">
@if (Auth::user())
<li><a href="{{ url('/users/show/',Auth::user()->id ) }}" class="btn btn-link">{{ Auth::user()->name }}</a></li>
<li>{!! HTML::link('/auth/logout', 'Logout', array('class' => 'fa fa-sign-out fa-fw')) !!}</li>
@else
<li>
    <a href="/auth/login">
    <span class="glyphicon glyphicon-log-in"></span> Login</a>
    </li>
<li><a href="/auth/register"> <span class="glyphicon glyphicon-registration-mark"></span> Register</a>
    </li>
    @endif
      </ul>
    </div>
  </div>
</nav>
@yield('modal')
@section('sidebar')
@show
<div class="container-fluid">
  <div class="row content">
    <nav class="navbar navbar-inverse navbar-fixed-top  hidden-xs" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="{{ url('/admin') }}"><img src="/pics/h.jpg" height="30" width="41"></a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li class="{{ Request::path() == '/' ? 'active' : '' }}"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>View Site</a></li>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Categories<span class="caret"></span></a><ul class="dropdown-menu">
<li class="{{ Request::path() == '/categories/1' ? 'active' : '' }}"><a href="{{ url('/categories/1') }}" class="dropdown-header">Appliances</a><li role="separator" class="divider"></li>
<li><a href="/types/1">Toys</a></li>
<li><a href="/types/2">Electronics</a></li>
</li><li role="separator" class="divider"></li>
<li><a href="/categories/2" class="dropdown-header">Real Estates</a><li role="separator" class="divider"></li>
<li><a href="/types/3">Land</a></li>
<li><a href="/types/4">Mortgages</a></li>
</li><li role="separator" class="divider"></li>
<li><a href="/categories/3" class="dropdown-header">Jobs</a><li role="separator" class="divider"></li>
<li><a href="/types/5">Blue Collar</a></li>
<li><a href="/types/6">White Collar</a></li>
</li><li role="separator" class="divider"></li>
<li><a href="/categories/4" class="dropdown-header">Vehicles</a><li role="separator" class="divider"></li>
<li><a href="/types/7">Bikes</a></li>
<li><a href="/types/8">Cars</a></li>
</li>
</ul>
</li>
<li><a href="aboutus.html"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>About</a></li> 
<li><a href="contactus.html"><span class="fa fa-envelope-o">Contact</span></a></li>
</ul>

<ul class="nav navbar-nav navbar-right">
@if (Auth::user())
<li><a href="/users/{{ Auth::user()->id }}" class="btn btn-link">{{ Auth::user()->name }}</a></li>
<li>{!! HTML::link('/auth/logout', 'Logout', array('class' => 'fa fa-sign-out fa-fw')) !!}</li>
@else
<li>
    <a href="/auth/login">
    <span class="glyphicon glyphicon-log-in"></span> Login</a>
    </li>
<li><a href="/auth/register"> <span class="glyphicon glyphicon-registration-mark"></span> Register</a>
    </li>
    @endif
</ul>
</div>
</div>
</nav>
<div class="col-sm-3 sidenav hidden-xs"> 
<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav nav-pills nav-stacked">
<li class="active"><a href="/admin" class="bg-4">Dashboard</a></li>
         <li class="dropdown"> <a href="#" class="dropdown-toggle bg-4" data-toggle="dropdown">Roles<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('roles') }}">View Roles</a></li>
    <li><a href="{{route('roles.createrole') }}">New Role</a></li> 
  </ul> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle bg-4" data-toggle="dropdown">Permission<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('permissions.index') }}">View Permissions</a></li>
    <li><a href="{{route('permissions.create') }}">New Permission</a></li> 
  </ul> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle bg-4" data-toggle="dropdown">Users<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('users') }}">View Users</a></li>
    <li><a href="{{route('users.create') }}">New Users</a></li> 
  </ul> </li>        
      </ul>
    </div>
    </div>
    <br>
    
<div class="notice">
            @if (isset($errors) && $errors -> any())
            <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><b>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul></b>
            </div>
        @endif
        </div>
  <div class="col-sm-6">
  <br><br>
<div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('product_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('/')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('/')}}?ok=1&search='+$('#search').val())"><i
                        class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div><br>
    </div>
    @yield('content')
  </div>
</div>
<script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>