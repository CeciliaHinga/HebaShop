<!DOCTYPE html>
<html lang="en">
<head>
<title>Heba&nbsp;:&nbsp;@yield('title')</title>
<meta http-equiv = "Content-Type" name="csrf-token" content="{{ csrf_token() }}" charset="utf-8">
<link rel="stylesheet" href="{!! elixir('css/final.css') !!}">
{!!Html::style('css/bootstrap-social.css')!!}

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="{{ url('/') }}"><img src="/pics/h.jpg" height="30" width="41"></a>
</div>
@if (Entrust::hasRole('Admin'))
<div class="navbar-collapse collapse in" id="navbar">
      <ul class="nav navbar-nav navbar-right">
<li  class="{{ url()->current()==url('/admin')?'active':'' }}" ><a href="/admin">Dashboard</a></li>
         <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Roles<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li class="{{ url()->current()==url('/admin/roles')?'active':'' }}" ><a href="{{route('roles.index') }}">View Roles</a></li>
    <li class="{{ url()->current()==url('/admin/roles/createrole')?'active':'' }}" ><a href="{{route('roles.createrole') }}">New Role</a></li> 
  </ul> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Permission<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('permissions.index') }}">View Permissions</a></li>
    <li><a href="{{route('permissions.create') }}">New Permission</a></li> 
  </ul> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('users') }}">View Users</a></li>
    <li><a href="{{route('users.create') }}">New Users</a></li> 
  </ul> </li>
  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Categories<span class="caret"></span></a>
<ul class="dropdown-menu">
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
@if (Auth::user())
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<span class="caret"></span></a>
    <ul class="dropdown-menu dropdown-menu-right">
<li><a href="/users/{{Auth::user()->id}}" class="btn btn-link">{{ Auth::user()->name }}</a></li>
<li>{!! HTML::link('/auth/logout', 'Logout', array('class' => 'fa fa-sign-out')) !!}</li>
</ul></li>
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
@elseif (Entrust::hasRole('Shopkeeper'))
<div class="navbar-collapse collapse in" id="navbar">
      <ul class="nav navbar-nav navbar-right">
<li><a href="/owners"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>Dashboard</a></li>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Categories<span class="caret"></span></a>
<ul class="dropdown-menu">
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
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>Advertisements<span class="caret"></span></a>
<ul class="dropdown-menu">
<li class="{{ Request::path() == '/categories/1' ? 'active' : '' }}"><a href="{{ url('/advertisement') }}" class="dropdown-header">Post Advert</a><li role="separator" class="divider"></li>
<li><a href="/">View ADs</a></li>
<li><a href="/advertisement/create">My Adverts</a></li>
</li></ul></li>
         <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-users" aria-hidden="true"></span>Customers<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('roles.index') }}">View Roles</a></li>
    <li><a href="{{route('roles.createrole') }}">New Role</a></li> 
  </ul> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>Products<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('permissions.index') }}">View Permissions</a></li>
    <li><a href="{{route('permissions.create') }}">New Permission</a></li> 
  </ul> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>Sales<span class="caret"></span></a>  
       <ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{route('users') }}">View Users</a></li>
    <li><a href="{{route('users.create') }}">New Users</a></li> 
  </ul> </li>
   @if (Auth::user())
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Profile<span class="caret"></span></a>
    <ul class="dropdown-menu dropdown-menu-right">
<li><a href="/users/{{Auth::user()->id}}" class="btn btn-link">{{ Auth::user()->name }}</a></li>
<li>{!! HTML::link('/auth/logout', 'Logout', array('class' => 'glyphicon glyphicon-log-out')) !!}</li>
</ul></li>
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
@else
<div id="navbar" class="navbar-collapse collapse in" id="navbar">
<ul class="nav navbar-nav navbar-right">
<li class="{{ Request::path() == '/' ? 'active' : '' }}"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Categories<span class="caret"></span></a>
<ul class="dropdown-menu">
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
<li  class="{{ url()->current()==url('/aboutus')?'active':'' }}" ><a href="/aboutus"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>About</a></li> 
<li class="{{ url()->current()==url('/contact')?'active':'' }}" ><a href="/contact"><span class="fa fa-envelope-o">Contact</span></a></li>
@if (Auth::user())
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<span class="caret"></span></a>
    <ul class="dropdown-menu dropdown-menu-right">
<li><a href="/users/{{Auth::user()->id}}" class="btn btn-link">{{ Auth::user()->name }}</a></li>
<li>{!! HTML::link('/auth/logout', 'Logout', array('class' => 'glyphicon glyphicon-log-out')) !!}</li>
</ul></li>
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
@endif
</div>
</nav>
@yield('modal')
<header class="jumbotron">
        <!-- Main component for a primary marketing message or call to action -->
<div class="box box-solid">
            <div class="box-body" style="background: url('/uploadedimage/Screenshot 06.png') center center;">
<div id="carousel" class="carousel fade-in" data-ride="carousel">
                  <ol class="carousel-indicators">
                  @foreach($related as $i => $key)
                  @if($i == 5)
                  @break
                  @endif
                  <li data-target="#carousel" data-slide-to="{{$key}}" class=""></li>
                  @endforeach
                  </ol>
                <div class="carousel-inner" role="listbox">
                {{--*/ $isFirst = true; /*--}}
                @foreach($related as $i => $advert)
                @if($i == 5)
                  @break
                  @endif
                  <div class="item {{{ $isFirst ? ' active' : '' }}}">
                    <img src="/uploadedimage/advertising/slider/{{$advert->ads_image. '.' . $advert->image_extension . '?'. 'time='. time() }}" data-color="firebrick" alt="First slide">
                    <div class="carousel-caption">
                      <h3>{{$advert->ads_title}}</h3>
                    </div>
                  </div>
                  {{--*/ $isFirst = false; /*--}}
                  @endforeach
                </div>
                <a class="left carousel-control" href="#carousel" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            
      <!-- END CAROUSEL-->

</div>
            <!-- Main component for a primary marketing message or call to action -->
                     <div class="box-footer">
                     <div class="row"><div class="col-sm-4 border-right"><div class="description-block">
                      <h5 class="description-header"></h5><span class="description-text"></span>
                     </div></div><div class="col-sm-4 border-right"><div class="description-block">
                      <h5 class="description-header"></h5><span class="description-text"></span>
                     </div></div><div class="col-sm-4 border-right"><div class="description-block">
                      <h5 class="description-header"></h5><span class="description-text"></span>
                     </div>
                     </div> </div>
</div> </div></div>
    </header>

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
        <div class="container">
<div class="row">
@section('sidebar')
@show
  <div class="col-sm-6">
  <br>
{{ Form::open(['method' => 'get', 'route' => 'search']) }}
    <div class="input-group">
  {{ Form::input('search', 'query', Input::get('query', ''), array('placeholder' => 'Search...','class' => 'form-control'))}}
        <div class="input-group-btn">
  {{ Form::submit('Search', array('class' => 'btn btn-primary','i' => 'glyphicon glyphicon-search')) }}
  </div>
</div>
{{ Form:: close() }}<br>
    </div>
@yield('content')
</div>
</div>
<footer class="row-footer">
        <div class="container">
            <div class="row">             
                <div class="col-xs-5 col-xs-offset-1 col-sm-2 col-sm-offset-1">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/">Home</a></li>
                     @if(Auth::user())   <li><a href="/advertisement">Advertise</a></li>@endif
                        <li><a href="/aboutus">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-5">
                    <h5>Our Address</h5>
                    <address>Address<br>
                      <i class="fa fa-phone"></i>: +254 711 391705<br>
                      <i class="fa fa-envelope"> P.O Box 22701-00400 Nairobi</i></br>
                      Email:<a href="mailto:ceciliahinga@gmail.com"> ceciliahinga(at)gmail(dot)com</a>
                   </address>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="nav navbar-nav" style="padding: 40px 10px;">
                        <a class="btn btn-social-icon btn-google-plus" href="http://google.com/+" target="_blank"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id=" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-youtube" href="http://youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a class="btn btn-social-icon" href="mailto:ceciliahinga@gmail.com"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>© Copyright 2016 Heba Online. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="{!! elixir('js/final.js') !!}" async defer></script>

@yield('scripts')
<script>
  var $item = $('.carousel .item');
var $wHeight = $(window).height();

$item.height($wHeight); 
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});
var $numberofSlides = $('.item').length;
var $currentSlide = Math.floor((Math.random() * $numberofSlides));

$('.carousel-indicators li').each(function(){
  var $slideValue = $(this).attr('data-slide-to');
  if($currentSlide == $slideValue) {
    $(this).addClass('active');
    $item.eq($slideValue).addClass('active');
  } else {
    $(this).removeClass('active');
    $item.eq($slideValue).removeClass('active');
  }
});
</script>
    </body>
</html>