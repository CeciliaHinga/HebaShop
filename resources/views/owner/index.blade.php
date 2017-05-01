@extends('layouts.owner')

@section('title','Dashboard')

@section('content')
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <h4><span class="info-box-text">Customers</span></h4>
            <p><span class="info-box-number">{{count($users)}}<small>
           
            <!-- {{ count($members) }} -->
        
            </small></span></p></div>
          </div>
          </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box"> <span class="info-box-icon bg-green"><i class="fa fa-home"></i></span>
          <div class="info-box-content">
            <h4><span class="info-box-text">Sales</span></h4>
            <p><span class="info-box-number"><small>{{count($sales)}}</small></span></p></div>
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
    <div class="box">
        <div class="col-sm-6">
        <div class="box box-danger">
          <div class="box-header"><h3 class="box-title">Customers</h3><div class="box-tools pull-right">
          <span class="label label-danger">{{count($users)}} Customers</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div></div>
          <div class="box-body"><ul class="users-list clearfix">
          @foreach($sales as $sale) @foreach ($members as $user) @if($sale->id == $user->id)
             @if(!$user->name ||  !$user->image_extension)
          <li><img src="/pics/boxed-bg.jpg" class="img-circle" alt="User Image">
          <a class="users-list-name" href="{{ route('users.show',$sale->id) }}">{{$user->name}}</a><span class="users-list-date">{{$user->created_at->format('j F, Y')}}</span>
          <span class="users-list-date">@foreach ($user->roles as $role) {{ $role->display_name }}@endforeach</span></li>
             @else
          <li><img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . $user->name. '.' . $user->image_extension . '?'. 'time='. time() }}" class="img-circle" alt="User Image">
          <a class="users-list-name" href="{{ route('users.show',$user->user_id) }}">{{$user->name}}</a><span class="users-list-date">{{$user->created_at->format('j F, Y')}}</span>
          <span class="users-list-date">@foreach ($user->roles as $role) {{ $role->display_name }}@endforeach</span></li>@endif
          @endif @endforeach @endforeach</ul></div><div class="box-footer text-center"><!-- <a class="uppercase" href="{{route('users') }}">View All Users</a> --></div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="box box-danger">
<div class="box-header"><h3 class="box-title">Sales Report</h3><div class="box-tools pull-right">
          <!-- <span class="label label-danger">{{$users}} Customers</span> -->
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div></div>
          <div class="box-body"><div class="table-responsive">
            <table class="table no-margin">
            <thead><tr><th>OrderID</th><th>Item</th><th>Customer</th><th>Cost</th></tr></thead>
            <tbody>@foreach($sales as $sale) @foreach($members as $user)
            @if($sale->id == $user->id)
            <tr><td>{{$sale->instance}}</td><td>{{$sale->ads_title}}</td><td>{{$user->name}}</td><td>{{$sale->ads_price}}</td>
            @endif @endforeach @endforeach</tbody></table>
          </div>
          </div><div class="box-footer clearfix">
<!--           <a class="btn btn-sm btn-info btn-flat pull-left" href="{{route('advertisement.cart') }}">Place New Order</a>
 -->          <a class="btn btn-sm btn-default btn-flat pull-right" href="{{route('orders.print') }}">View All Orders</a>
          </div>
          <!-- <div class="chart">
          <div class="chart-container">
          <canvas id="salesChart" class="chart chart-line" chart-data="data" chart-labels="labels" chart-legend="false" chart-series="series" chart-click="onClick" style="height: 166px; width: 650px;" height="166" width="650">
                </canvas>
                </div> </div> --> </div>
        </div>
      @endsection