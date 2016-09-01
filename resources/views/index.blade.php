 @extends('layouts.master')

@section('title','Home')

@section('sidebar')

	@parent
  
    
@endsection
@section('content')

<div class="container">
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                @foreach($advertisement as $advert)
<div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <h3 align=center>{{ $advert->ads_title }}</h3>
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
            <div class="media">
            <div class="media-left media-middle">
            <a href="#">
            <img class="media-object img-thumbnail" src="{{ $advert->ads_image }}">
            </a>
            </div>
            <div class="media-body">
                <h2 class="media-header">{{ $advert->ads_title }}&puncsp;@if ($advert->is_featured==0)
                <span class="label label-primary label-xs">Not Featured
                </span>@elseif($advert->is_featured==1)
                <span class="label label-danger label-xs">Featured
                </span>
                @endif&puncsp;
                @if ($advert->is_active==0)
                <span class="label label-info label-xs">Not Active
                </span>@elseif($advert->is_active==1)
                <span class="label label-success label-xs">Active
                </span>
                @endif
                &puncsp;&puncsp;<span class="badge">
                {{ $advert->ads_price }}</span></h2>
                <p>{{ $advert->ads_content }}</p>
                <p><a class="btn btn-primary btn-xs" href="#">More &raquo;</a></p>
            </div>
        </div>
                </div>
                </div>
                @endforeach
                </div>
                </div>
                </div>
                </div>
                </div>
@endsection
