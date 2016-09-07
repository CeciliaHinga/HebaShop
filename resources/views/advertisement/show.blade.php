 @extends('layouts.master')

@section('title','Advert')

@section('sidebar')

	@parent
  
    
@endsection
@section('content')
 {!! Breadcrumb::withLinks(['Home'   => '/',
   'My Adverts' => '/advertisement',
   "$advertisement->ads_title"
   ]) !!}
   <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Advert</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('advertisement') }}"> Back</a>
            </div>
        </div>
    </div>
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Advert</div>
                <div class="panel-body">
<div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <h3 align=center>{{ $advertisement->ads_title }}</h3>
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
            <div class="media">
            <div class="media-left media-middle">
            <a href="#">
            <img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advertisement->ads_image. '.' . $advertisement->image_extension . '?'. 'time='. time() }}">
            </a>
            </div>
            <div class="media-body">
                <div class="media-header"><h2>{{ $advertisement->ads_title }}</h2><h4>@if ($advertisement->is_featured==0)
                <span class="label label-primary label-xs">Not Featured
                </span>@elseif($advertisement->is_featured==1)
                <span class="label label-danger label-xs">Featured
                </span>
                @endif&puncsp;
                @if ($advertisement->is_active==0)
                <span class="label label-info label-xs">Not Active
                </span>@elseif($advertisement->is_active==1)
                <span class="label label-success label-xs">Active
                </span>
                @endif
                &puncsp;&puncsp;<span class="badge">
                ${{ $advertisement->ads_price }}</span>
                </h4></div>
                <p>{{ $advertisement->ads_content }}</p>
                <p><a class="btn btn-primary btn-xs" href="#">More &raquo;</a></p>
            </div>
        </div>
                </div>
                </div>
                </div>
                </div>
                </div>

@endsection