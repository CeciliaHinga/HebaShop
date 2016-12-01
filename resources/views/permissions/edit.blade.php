@extends('layouts.admin')

@section('title','Permission|Edit')
@section('content')
<div class="col-sm-9">
	<div class="row">
	    <div class="col-lg-10 col-lg-offset-2 col-xs-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Permission</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="col-sm-10 col-sm-offset-2" >
	{!! Form::model($permission, ['method' => 'PATCH','route' => ['permissions.update', $permission->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
	</div>
	<hr>
	</div>
@endsection