@extends(Entrust::hasRole('Admin') ? 'layouts.admin' :'layouts.owner' )
@section('title','Page Not Found')
 
@section('content')
	<div class="container"><h1>Page not found</h1></div>
@endsection