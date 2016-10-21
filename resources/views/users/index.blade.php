<<<<<<< HEAD
@extends('layouts.admin')
=======
@extends('layouts.master')
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

@section('title','Users')

@section('sidebar')

	@parent
<<<<<<< HEAD
    
@endsection

 
@section('content')
<div class="col-sm-10 col-sm-offset-2">
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Users Management</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
			<!--<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>-->
			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
	</div>
@endsection
=======
    <p>This is freaky!!</p>
    
@endsection

@section('content')
  
@endsection  
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
