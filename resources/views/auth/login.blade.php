@extends('layouts.master')
<<<<<<< HEAD
@section('title','Login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
        <div class="col-sm-4 col-xs-12">
        <div class="btn-block">
        <div class="col-sm-12 col-xs-5">
        <a href="redirect/facebook" class="btn btn-facebook btn-lg">Login with Facebook  <i class="fa fa-btn fa-facebook"></i></a></div>
        <div class="col-sm-12  col-xs-1" style="padding:40px 10px;"></div>
        <div class="col-sm-12  col-xs-1"  style="padding:40px 10px;"></div>
        <div class="col-sm-12 col-xs-5">
         <a href="redirect/google" class="btn btn-google-plus btn-lg">Login with Google  <i class="fa fa-btn fa-google"></i></a>
                      </div>
                      </div>
                      </div>
        <div class="col-sm-8 col-xs-12">
=======

@section('title','Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
<<<<<<< HEAD
=======
                               
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
<<<<<<< HEAD
                                </button>
                            </div>
                            <div class="col-md-3 col-md-offset-3"><a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a></div><div class="col-md-3 col-md-offset-3">
                                <a href="/auth/register" class="btn btn-link">Register</a>
=======
                                </button>&nbspOR&nbsp<a class="fa btn btn-primary fa-user" href="{{ url('/auth/register') }}">&nbspRegister</a>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
                            </div>
                        </div>
                    </form>
                </div>
<<<<<<< HEAD
                </div>
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
            </div>
        </div>
    </div>
</div>
@endsection
