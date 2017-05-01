@extends('layouts.customer')

@section('title','Dashboard')

@section('content')
      <div class="row">
<!--         <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
          <a href="{{route('users') }}"><div class="info-box-content">
            <h4><span class="info-box-text">Users</span></h4>
            <p><span class="info-box-number"><small>{{ $users }}</small></span></p></div></a>
          </div>
          </div>
 -->        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <a href="{{route('shops.home')}}"><span class="info-box-icon bg-green"><i class="fa fa-home"></i></span>
          <div class="info-box-content">
            <h4><span class="info-box-text"><strong>Shops</strong></span></h4>
            <p><span class="info-box-number"><small>{{count($users)}}</small></span></p></div></a>
          </div>
          </div>
          <div class="clearfix visible-sm-block"></div>
<!--         <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="fa fa-twitter"></i></span>
          <div class="info-box-content">
            <h4><span class="info-box-text">FOLLOWERS</span></h4>
            <p><span class="info-box-number"><small>41,654</small></span></p></div>
          </div>
          </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-blue"><i class="fa fa-facebook"></i></span>
          <div class="info-box-content">
            <h4><span class="info-box-text">LIKES</span></h4>
            <p><span class="info-box-number"><small>12,589</small></span></p></div>
          </div>
          </div>
 -->      </div>
    <div class="row">
                <div class="col-sm-6">
        <div class="box box-danger">
          <div class="box-header"><h3 class="box-title">Shops</h3><div class="box-tools pull-right">
          <span class="label label-danger">{{count($users)}} Shops</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div></div>
          <div class="box-body"><ul class="users-list clearfix">
@foreach ($users as $user)
            @if(!$user->name ||  !$user->image_extension)
          <li><img src="/pics/boxed-bg.jpg" class="img-circle" alt="User Image">
          <a class="users-list-name" href="{{ route('shops.show',$user->id) }}">{{$user->name}}</a>
                    <span class="users-list-date">@foreach ($user->roles as $role) {{ $role->display_name }}@endforeach</span></li>
@else
          <li><img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . $user->name. '.' . $user->image_extension . '?'. 'time='. time() }}" class="img-circle" alt="User Image">
          <a class="users-list-name" href="{{ route('shops.show',$user->id) }}">{{$user->name}}</a>
          <span class="users-list-date">@foreach ($user->roles as $role) {{ $role->display_name }}@endforeach</span></li>@endif
          @endforeach</ul></div><div class="box-footer text-center"><a class="uppercase" href="{{route('shops.home')}}">View All Shops</a></div>
</div> </div>
        </div>
      @endsection