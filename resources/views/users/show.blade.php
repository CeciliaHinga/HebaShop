@extends('layouts.master')

@section('title','Profile')

@section('sidebar')

	@parent
  
    
@endsection
@section('content')
<div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Profile</div>
                <div class="panel-body">
        
	<div class="row row-content">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $users->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $users->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($users->roles))
					@foreach($users->roles as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
            </div>
        </div>
	</div>
	</div></div></div>
@endsection