@extends('layouts.master')

<<<<<<< HEAD
@section('title','Categories')
=======
@section('title','Page Title')
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

@section('sidebar')

	@parent
<<<<<<< HEAD
=======
    <p>This is me not freaking out!</p>
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    
@endsection

@section('content')
<<<<<<< HEAD
{!! Breadcrumb::withLinks(['Home' => '/',  'Advertise' => '/advertisement', 'categories'])!!}
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories
                </div>
                <div class="pagination">{{ $categories->links() }}</div>
                <div class="panel-body">
                @foreach($categories as $advert)
<div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <h3 align=center>{{ $advert->ads_title }}</h3>
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
            <div class="media">
            <div class="media-left media-middle">
            <a href="/categories/{{ $advert->id }}">
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
                <p><a class="btn btn-primary btn-xs" href="#">More &raquo;</a></p>
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
=======
<p>This is my body content</p>  
@endsection  
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
