@extends('layouts.customer')
@section('content')
<div class="row">
@foreach ($users as $user)
         <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary"><div class="box-body box-profile">
            @if(!$user->name ||  !$user->image_extension)
               <img src="/pics/boxed-bg.jpg" class="profile-user-img img-responsive img-circle" alt="User Image"/>
              @else
            <img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . $user->name. '.' . $user->image_extension . '?'. 'time='. time() }}" class="profile-user-img img-responsive img-circle" alt="User Image"/>
                     @endif<h3 class="profile-username text-center"><a href="{{ route('shops.show',$user->user_id) }}">{{ $user->name }}</a></h3>
                     <p class="text-muted text-center">@foreach($roles as $role) @if($role->id == 2) {{$role->display_name}} @endif @endforeach</p>
</div> </div>
</div> @endforeach
</div>
@endsection