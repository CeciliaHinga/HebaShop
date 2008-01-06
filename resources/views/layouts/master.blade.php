<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv = "Content-Type" name="csrf-token" content="{{ csrf_token() }}; charset=utf-8" />
<title>Heba&nbsp;:&nbsp;@yield('title')</title>
{!!Html::style('css/bootstrap.min.css')!!}
{!!Html::style('css/font-awesome.min.css')!!}
{!!Html::style('css/bootstrap-social.css')!!}
{!!Html::style('css/bootstrap-theme.min.css')!!}
{!!Html::style('css/mystyles.css')!!}
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="{{ url('/') }}"><img src="/pics/h.jpg" height="30" width="41"></a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li class="{{ Request::path() == '/' ? 'active' : '' }}"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
<li  class="{{ Route::is('/advertisement.*') ? 'active' : '' }}" ><a href="{{ url('/advertisement') }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Advertise</a></li>
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
<header class="jumbotron">
        <!-- Main component for a primary marketing message or call to action -->

        <div class="container">
            <div class="row row-header">
                <div class="col-xs-12 col-sm-8">
                    <h1>Heba Online</h1>
                    <p style="padding:40px;"></p>
                    <p>We pride in making business as seamless as possible</p>
                </div>
                <div class="col-xs-12 col-sm-2">
                <p style="padding:20px;"></p>
                <img src="/pics/heba.jpg" id="pic" class="img-responsive">
                </div>
                <div class="col-xs-12 col-sm-2">
                <p style="padding:20px"></p>
                <img src="/pics/ads.jpg" class="img-responsive">
                </div>
            </div>
        </div>
    </header>

    <div class="notice">
            @if (count($errors) > 0)
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
<div id="sidebar">
 <nav class="hidden-xs col-sm-1 navbar" >
<div class="nav navbar-nav navbar-collapse collapse" id="navbar" data-spy="affix">
<ul class="nav nav-pills nav-stacked">
<li class="dropdown bg-1"><a href="/categories/1" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Appliances</a>
  <ul class="dropdown-menu dropdown-menu-right" role="menu">
    <li><a href="/types/1">Toys</a></li>
    <li><a href="/types/2">Electronics</a></li> 
  </ul> </li>
  <li class="dropdown bg-1"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Real Estates</a>
  <ul class="dropdown-menu dropdown-menu-right" role="menu">
    <li><a href="/types/3">Land</a></li>
    <li><a href="/types/4">Mortgages</a></li>
  </ul> </li>
    <li class="dropdown bg-1"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jobs</a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="/types/5">White Collar</a></li>
    <li><a href="/types/6">Blue Collar</a></li>
  </ul> </li>
    <li class="dropdown bg-1"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vehicles</a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="/types/7">Bikes</a></li>
    <li><a href="/types/8">Cars</a></li>
  </ul>
  </li>
  </ul>
  </div>
  </nav>
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
                        <li><a href="/advertisement">Advertise</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
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
                        <a class="btn btn-social-icon btn-google-plus" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-youtube" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
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
<script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @yield('scripts')
    </body>
</html>