@extends('layouts.app')

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
            <div class="form-group"><select type="dropdown" class="form-control dropdown dropdown-toggle" id="roles" name="roles" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" required>
        <option value="">Select A Role</option>
@foreach($roles as $role)       
        @if ($role->id==2 || $role->id==3)
            <option value="{{ $role->name }}"> {{ $role->display_name }} </option>
        @endif
       @endforeach
        </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
    </div>
@endsection
<br><br><br><br><br><br>