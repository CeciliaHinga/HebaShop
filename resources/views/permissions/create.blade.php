@extends('layouts.admin')

@section('title','Permission')
 
@section('content')
        <div class="col-sm-9 ">
	        <div class="pull-left">
	            <h2>Create New Permission</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
	        </div>
	    
	{!! Form::open(array('route' => 'permissions.create','method'=>'POST')) !!}
	<div class="row">
		<div class="col-sm-9">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-9 col-md-9">
            <div class="form-group">
                <strong>Display Name:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
        </div>
	{!! Form::close() !!}
@endsection