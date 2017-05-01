@extends('layouts.app')
@section('title','Contact Us')
@section('content')
<div class="row">
	    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    </div>
<div class="container">
	<div class="row login-box-body">
		<div class="box box-info">
			<div class="box-header"><i class="fa fa-envelope"></i><h3 class="box-title">Talk To Us:</h3>
			<div class="box-body">
			<form action="" method="POST">
			<div class="form-group"><input type="text" class="form-control" name="name" placeholder="Your Name" required></div>
			<div class="form-group"><input type="email" class="form-control" name="email" placeholder="Email" required></div>
			<div class="form-group"><input type="text" class="form-control" name="subject" placeholder="Subject" required></div>
			<div class="form-group"><textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea></div></form></div>
			<div class="box-footer"><button type="button" class="pull-right btn btn-info btn-block" id="sendEmail">Send<i class="fa fa-arrow-circle-right"></i></button></div>
		</div>
	</div>
</div></div>
@endsection