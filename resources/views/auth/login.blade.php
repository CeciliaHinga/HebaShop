@extends('layouts.auth')
@section('title','Login')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><img src="/pics/heba.jpg" class="portfolio" id="icon"> 
<b>HEBA</b>SHOP</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
           <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  has-feedback">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>                                
        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span> 
        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
<div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">
          <i class="fa fa-btn fa-sign-in"></i>&nbsp;&nbsp;Sign In</button>
        </div>
        <!-- /.col -->
      </div> </form>
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="redirect/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="redirect/google" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="{{ URL::to('/auth/passwords/reset') }}">I forgot my password</a><br>
    <a href="/auth/register" class="text-center">Register a new member</a><br><hr>
    <a href="/" class="text-center"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;&nbsp;Go to HebaShop Home</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
@section('scripts')
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection
