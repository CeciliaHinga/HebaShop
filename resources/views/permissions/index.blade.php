@extends('layouts.master')

@section('title','Roles')

@section('content')
	<div class="row">
	    <div class="col-lg-10 col-lg-offset-2 col-xs-12 margin-tb">
	        <div class="pull-left">
	            <h2>Permission Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('role-create')
	            <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<div class="col-sm-10 col-sm-offset-2">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($permissions as $key => $permission)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $permission->display_name }}</td>
		<td>{{ $permission->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
			@permission('role-edit')
			<a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
			@endpermission
			@permission('role-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $permissions->render() !!}
	</div>
@endsection