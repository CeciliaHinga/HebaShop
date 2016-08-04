<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
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
<a class="navbar-brand" href="index.html"><img src="/pics/heba.jpg" height="30" width="41"></a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
<li><a href="aboutus.html"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Advertise</a></li>
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Categories<span class="caret"></span></a><ul class="dropdown-menu">
<li><a href="#">Appliances</a></li>
<li><a href="#">Real Estate</a></li>
<li><a href="#">Jobs</a></li>
<li><a href="#">Motor Vehicles</a></li>
</ul></li>
<li><a href="aboutus.html"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>About</a></li> 
<li><a href="contactus.html"><span class="fa fa-envelope-o">Contact</span></a></li>
</ul>


<ul class="nav navbar-nav navbar-right">
@if (Auth::user())
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
 <div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!--modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
              <form class="form-inline" role="form" method="POST" action="/auth/login">
<div class="form-group">
{!! csrf_field() !!}
<input type="email" class="form-control input-sm" id="Email" name="Email" placeholder="Email" value="{{ old('email') }}">
<input type="password" class="form-control input-sm" id="password" name="Email" placeholder="Password">
</div>
<div class="form-group">
<div class="checkbox">
<label class="checkbox-inline">
<input type="checkbox" name="remember" value=""><font color="#303F9F">Remember me</font></label>
</div>
</div> 
<div class="form-group">
<a href="#">
<button type="submit" class="btn navbar-btn btn-info">Sign In</button>
</a>
    <a href="#">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
    </a>
</div>
</form> 
            </div>
        </div>
        </div>
    </div>
    <div class="notice">
@section('sidebar')
 
@show
<div>
@yield('content')
</div>
{!!Html::script('js/jquery-1.9.1.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
<script>
    $(document).ready(function(){
                      $("#mycarousel").carousel({interval:2000});
    $("#carousel-pause").click(function(){
                               $("#mycarousel").carousel('pause');
                               });
    $("#carousel-play").click(function(){
                               $("#mycarousel").carousel('cycle');
                               });
        $("#login").click(function(){
            $("#loginModal").modal();
        });
        $("#reservebutton").click(function(){
            $("#reserveModal").modal();
        });
                     });
    </script>
</body>
</html>
