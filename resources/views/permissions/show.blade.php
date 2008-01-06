@extends('layouts.master')

@section('title','Permissions|Show')
@section('content')
	<div class="row">
	    <div class="col-lg-10 col-lg-offset-2 col-xs-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show Permission</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="col-sm-10 col-sm-offset-2">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $permission->display_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $permission->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($rolePermissions))
					@foreach($rolePermissions as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
            </div>
        </div>
	</div>
	</div>
@endsection