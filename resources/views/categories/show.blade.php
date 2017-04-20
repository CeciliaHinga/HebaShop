@extends('layouts.master')

@section('title','Categories')

@section('sidebar')

	@parent
    
@endsection

@section('content')
@if(Entrust::hasRole('Shopkeeper'))
{!! Breadcrumb::withLinks(['Home' => '/',  'Advertise' => '/advertisement', 'Categories' => '/categories', "$advertisement->name" ])!!}
@else
{!! Breadcrumb::withLinks(['Home' => '/', 'Categories' => '/categories', "$advertisement->name" ])!!}
@endif
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@if ($categories)
               {{ $advertisement->name }}
                @endif
                </div>
                <div class="pagination">{{ $categories->links() }}</div>
                <div class="panel-body">
                @foreach($categories as $advert)
<div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <div class="col-sm-12"><h3 align=center>{{ $advert->ads_title }}</h3></div>
                &puncsp;&puncsp;
                <div class="col-sm-12">
                Posted by:
                <a href="/advertisement/create"> {{ $advert->name }}</a></div>
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
            <div class="media">
            <div class="media-left media-middle">
            @if(Auth::user())<a href="/advertisement/{{ $advert->id }}">@endif
            <img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advert->ads_image. '.' . $advert->image_extension . '?'. 'time='. time() }}">
            </a>
            </div>
            <div class="media-body">
                <div class="media-header"><h2>{{ $advert->ads_title }}</h2><h4>@if ($advert->is_featured==0)
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
                ${{ $advert->ads_price }}</span>
                </h4></div>
                <p>{{ $advert->ads_content }}</p>
        <!--        <p><a class="btn btn-primary btn-xs" href="#">More &raquo;</a></p>-->
            </div>
        </div>
                </div>
                </div>                
                @endforeach
                <div class="pagination">{{ $categories->links() }}</div>
                </div>
                </div>
                </div>
@endsection