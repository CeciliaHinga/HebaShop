@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="col-sm-9">
      <div class="well bg-4">
        <h4>Dashboard</h4>
        <p>Welcome {{ Auth::user()->name }}.</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <a href="{{route('users') }}"><div class="well bg-1">
            <h4>Users <i class="fa fa-user"></i></h4>
            <p>{{ $user }}</p>
          </div></a>
        </div>
        <div class="col-sm-3">
          <div class="well bg-4">
            <h4>Shops</h4>
            <p>{{ $role }}</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well bg-1">
            <h4>Sessions</h4>
            <p>10 Million</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well bg-4">
            <h4>Bounce</h4>
            <p>30%</p>
          </div>
        </div>
      </div>
    <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <p><h3>Google Maps</h3></p>
            <img class="image" src="/pics/img_region.jpg">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <p>Text</p>
            <p>Text</p>
            <p>Text</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>Text</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p>
          </div>
        </div>
      </div>
      </div>
      @endsection