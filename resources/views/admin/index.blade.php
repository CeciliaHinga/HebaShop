@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Some text..</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Users <i class="fa fa-user label-primary"></i></h4>
            <p>{{ $user }}</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Pages</h4>
            <p>100 Million</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Sessions</h4>
            <p>10 Million</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Bounce</h4>
            <p>30%</p>
          </div>
        </div>
      </div>
    <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p>
            <p>Text</p>
            <p>Text</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p>
            <p>Text</p>
            <p>Text</p>
          </div>
        </div>
        <div class="col-sm-4">
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