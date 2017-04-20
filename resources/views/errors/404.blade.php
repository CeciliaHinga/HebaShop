@extends(Entrust::hasRole('Admin') ? 'layouts.admin' :'layouts.owner' )
@section('title','Page Not Found')
 
@section('content')
	<section class="container"><div class="error-page"><h2 class="headline text-red">Page not found</h2></div></section>
@endsection