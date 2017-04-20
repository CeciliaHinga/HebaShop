@extends(Entrust::hasRole('Admin') ? 'layouts.admin' :'layouts.owner' )
@section('title','Problem loading page')

@section('sidebar')

	@parent
    
@endsection

 
@section('content')
<section class="content">
	<div class="error-page"><h2 class="headline text-red">Loading Error</h2>
	<div class="error-content"><h3><i class="fa fa-warning text-yellow"></i>Seems to be a problem loading this page</h3>
</section>
@endsection