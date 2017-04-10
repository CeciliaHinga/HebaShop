@extends(Entrust::hasRole('Admin') ? 'layouts.admin' :'layouts.owner' )
@section('title','Permission Denied')

@section('sidebar')

	@parent
    
@endsection

 
@section('content')
	<h1>You don't have permission.</h1>
@endsection