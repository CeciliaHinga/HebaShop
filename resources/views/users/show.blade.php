@extends(Entrust::hasRole('Admin') ? 'layouts.admin' :'layouts.owner' )

@section('title','Profile')

@section('sidebar')

	@parent
  
    
@endsection
@section('content')
<div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">User Profile <div class="pull-right"><a href="{{ route('users.edit',$users->id)}}">Edit</a></div>
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
                <strong>Role:</strong>
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