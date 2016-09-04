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
<li class="active"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
<li ><a href="{{ url('/advertisement') }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Advertise</a></li>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Categories<span class="caret"></span></a><ul class="dropdown-menu">
<li><a href="/categories/1" class="dropdown-header">Appliances</a><li role="separator" class="divider"></li>
<li><a href="#">Electronics</a></li>
<li><a href="#">Toys</a></li>
</li><li role="separator" class="divider"></li>
<li><a href="/categories/2" class="dropdown-header">Real Estates</a><li role="separator" class="divider"></li>
<li><a href="#">Land</a></li>
<li><a href="#">Mortgages</a></li>
</li></li><li role="separator" class="divider"></li>
<li><a href="/categories/3" class="dropdown-header">Jobs</a><li role="separator" class="divider"></li>
<li><a href="#">Blue Collar</a></li>
<li><a href="#">White Collar</a></li>
</li></li><li role="separator" class="divider"></li>
<li><a href="/categories/4" class="dropdown-header">Vehicles</a><li role="separator" class="divider"></li>
<li><a href="#">Cars</a></li>
<li><a href="#">Bikes</a></li>
</li></li>
</ul></li>
<li><a href="aboutus.html"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>About</a></li> 
<li><a href="contactus.html"><span class="fa fa-envelope-o">Contact</span></a></li>
</ul>


<ul class="nav navbar-nav navbar-right">
@if (Auth::user())
<li><a href="#" class="btn btn-link">{{ Auth::user()->name }}</a></li>
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
                <img src="/pics/heba.jpg" class="img-responsive">
                </div>
                <div class="col-xs-12 col-sm-2">
                <p style="padding:20px"></p>
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
 <nav class="hidden-xs col-sm-2" >
<div class="btn-group-vertical" data-spy="affix" data-offset-top="197">
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="collapse">Appliances</button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="/types/1">Electronics</a></li>
    <li><a href="/types/2">Toys</a></li>
  </ul>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="collapse">Real Estates</button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="/types/3">Land</a></li>
    <li><a href="/types/4">Mortgages</a></li>
  </ul>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="collapse">Jobs</button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="/types/5">White Collar</a></li>
    <li><a href="/types/6">Blue Collar</a></li>
  </ul>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="collapse">Vehicles</button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="/types/7">Cars</a></li>
    <li><a href="/types/8">Bikes</a></li>
  </ul>
  </div></nav>
@show
@yield('content')
</div>
</div>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/bootstrap.min.js"></script>
    @yield('scripts')
    </body>
</html>