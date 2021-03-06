@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
          <a href="{{route('users') }}"><div class="info-box-content">
            <h4><span class="info-box-text">Users</span></h4>
            <p><span class="info-box-number"><small>{{ $users }}</small></span></p></div></a>
          </div>
          </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-green"><i class="fa fa-home"></i></span>
          <div class="info-box-content">
            <a href="{{route('shops.home')}}"><h4><span class="info-box-text">Shops</span></h4>
            <p><span class="info-box-number"><small>{{ $role }}</small></span></p></a></div>
          </div>
          </div>
          <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
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
      </div>
    <div class="row">
        <div class="col-sm-6">
        <div class="box box-danger">
          <div class="box-header"><h3 class="box-title">Users</h3><div class="box-tools pull-right">
          <span class="label label-danger">{{$users}} Users</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div></div>
          <div class="box-body"><ul class="users-list clearfix">@foreach ($members as $user)
             @if(!$user->name ||  !$user->image_extension)
          <li><img src="/pics/boxed-bg.jpg" class="img-circle" alt="User Image">
          <a class="users-list-name" href="{{ route('users.show',$user->id) }}">{{$user->name}}</a><span class="users-list-date">{{$user->created_at->format('j F, Y')}}</span>
          <span class="users-list-date">@foreach ($user->roles as $role) {{ $role->display_name }}@endforeach</span></li>
             @else
          <li><img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . $user->name. '.' . $user->image_extension . '?'. 'time='. time() }}" class="img-circle" alt="User Image">
          <a class="users-list-name" href="{{ route('users.show',$user->id) }}">{{$user->name}}</a><span class="users-list-date">{{$user->created_at->format('j F, Y')}}</span>
          <span class="users-list-date">@foreach ($user->roles as $role) {{ $role->display_name }}@endforeach</span></li>@endif
          @endforeach</ul></div><div class="box-footer text-center"><a class="uppercase" href="{{route('users') }}">View All Users</a></div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="box box-danger">
<div class="box-header"><h3 class="box-title">Users Report</h3><div class="box-tools pull-right">
          <!-- <span class="label label-danger">{{$users}} Customers</span> -->
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div></div>
          <div class="box-body"><div class="table-responsive">
            <table class="table no-margin">
            <thead><tr><th>Name</th><th>Role</th><th>Email</th></tr></thead>
            <tbody>@foreach($members as $sale)
            <tr><td>{{$sale->name}}</td><td>@foreach ($sale->roles as $role) {{ $role->display_name }}@endforeach</td><td>{{$sale->email}}</td>
            @endforeach</tbody></table> {!! $members->render() !!}
          </div>
          </div><div class="box-footer clearfix">
<!--           <a class="btn btn-sm btn-info btn-flat pull-left" href="{{route('advertisement.cart') }}">Place New Order</a>
 -->          <a class="btn btn-sm btn-info btn-flat pull-right" href="{{route('users.report') }}">View Complete Report</a>
          </div>
          <!-- <div class="chart">
          <div class="chart-container">
          <canvas id="salesChart" class="chart chart-line" chart-data="data" chart-labels="labels" chart-legend="false" chart-series="series" chart-click="onClick" style="height: 166px; width: 650px;" height="166" width="650">
                </canvas>
                </div> </div> --> </div>
        </div>
        </div>
      @endsection