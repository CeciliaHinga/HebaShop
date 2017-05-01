@extends('layouts.admin')

@section('title','Role|Create')
 
@section('content')
<div class="col-sm-9 ">
	        <div class="pull-left">
	            <h2>Create New Role</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
	</div>
	{!! Form::open(array('route' => 'roles.createrole','method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-md-9">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-md-9">
            <div class="form-group">
                <strong>Display Name:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permission as $value)
                	<label>{!! Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) !!}
                	{{ $value->display_name }}</label>
                	<br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-md-9 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
    </div>
	{!! Form::close() !!}
@endsection