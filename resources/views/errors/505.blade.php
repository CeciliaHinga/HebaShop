@extends(Entrust::hasRole('Admin') ? 'layouts.admin' :'layouts.owner' )
@section('title','Problem loading page')

@section('sidebar')

	@parent
    
@endsection

 
@section('content')
	<h1>There seems to be a problem loading this page.</h1>
@endsection