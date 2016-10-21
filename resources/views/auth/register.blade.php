@extends('layouts.master')
<<<<<<< HEAD
@section('title','Register')
@section('content')
<?php $_SESSION["auth_type"] = "register"; ?>
=======

@section('title','Register')

@section('content')
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
<<<<<<< HEAD
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('auth/register') }}">
=======
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
<<<<<<< HEAD
=======

>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <div class="col-md-3 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                        </div>
                            <div class="col-md-3 col-md-offset-3">
                                <a href="/auth/login" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </a>
=======
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                              &nbsp;&nbsp;&nbsp;  
                                <a href="{{ url('/auth/login') }}" class="fa btn btn-primary fa-sign-in">&nbspLogin</a>
                                
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
