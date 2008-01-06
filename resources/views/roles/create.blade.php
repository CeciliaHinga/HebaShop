@extends('layouts.master')

@section('title','Role')

@section('content')
	<div class="row">
	    <div class="col-lg-10 col-lg-offset-2 col-xs-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New Role</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
	        </div>
	    </div>
	</div>

    <div class="col-sm-10 col-sm-offset-2"> 
	{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Display Name:</strong>
                @foreach($permission as $value)
                {!! Form::select('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
    </div>
@endsection