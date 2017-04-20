@extends(Entrust::hasRole('Admin') ? 'layouts.admin' :'layouts.owner' )
@section('title','Permission Denied')

@section('sidebar')

	@parent
    
@endsection

 
@section('content')
<section class="content">
	<div class="error-page"><h2 class="headline text-yellow">Permmission Denied</h2>
	<div class="error-content"><h3><i class="fa fa-warning text-yellow"></i>You don't have permission.</h3>
	<p>We are terribly sorry mate! It appears that you are not allowed in these kneck of the woods. You should probably go <a href="/">somewhere familiar</a>. </p></div></div>
</section>
@endsection