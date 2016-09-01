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
<a class="navbar-brand" href="{{ url('/') }}"><img src="/pics/heba.jpg" height="30" width="41"></a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
<li ><a href="{{ url('/advertisement') }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Advertise</a></li>
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
@section('sidebar')
 
@show
<div>
@yield('content')
</div>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/bootstrap.min.js"></script>
    @yield('scripts')
    </body>
</html>