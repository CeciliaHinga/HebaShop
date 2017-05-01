@extends('layouts.admin')

@section('title','Create User')

@section('sidebar')

    @parent
  
@endsection    
@section('content')
<div class="col-sm-9">
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New User</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users') }}"> Back</a>
	        </div>
	    </div>
	</div>
	{!! Form::open(array('route' => 'users.store','method'=>'POST','class' => 'form form-horizontal')) !!}
	<div class="row">
            <div class="form-group">
  <label for="inputName" class="col-sm-2 control-label"><strong>Name:</strong></label>
                    <div class="col-sm-10">
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div></div>
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label"><strong>Email:</strong></label>
                    <div class="col-sm-10">
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div></div>
            <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label"><strong>Password:</strong></label>
                    <div class="col-sm-10">
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div></div>
            <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label"><strong>Confirm Password:</strong></label>
                    <div class="col-sm-10">
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div> </div>
<!--                 <div class="form-group">
        <label for="image" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-3">
             @if(!Auth::user()->name || !Auth::user()->image_extension)
               <strong><i class="fa fa-envelope"></i><span class="label label-danger">Please Upload an Avatar</span></strong>
              @else
            <img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . !Auth::user()->name. '.' . !Auth::user()->image_extension . '?'. 'time='. time() }}" class="img-circle" alt="User Image"/>
                     @endif</div>
                    <div class="col-sm-7">
                <input type="file" class="form-control" name="image" value="" id="image">
        </div> </div>
 -->            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
            <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
	</div>
	{!! Form::close() !!}
    </div>
@endsection