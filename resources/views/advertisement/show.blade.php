 @extends('layouts.app')

@section('title','Advert')

@section('sidebar')

	@parent
  
    
@endsection
@section('content')<br>
 {!! Breadcrumb::withLinks(['Home'   => '/',
   'My Adverts' => '/advertisement/create',
   "$advertisement->ads_title"
   ]) !!}
   <div class="row">
        <div class="col-lg-10 col-lg-offset-2 col-xs-12 margin-tb">
            <div class="pull-left">
                <h2> Advert</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('advertisement') }}"> Back</a>
            </div>
        </div>
    </div>
   <div class="container">
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ $advertisement->ads_title }}</b></div>
                <div class="panel-body">
<div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <div class="col-sm-12"><h3 align=center>{{ $advertisement->ads_title }}</h3>
            </div>
                <p style="padding:20px;"></p>
                <div class="col-sm-12">
                Posted by:
                <a href="{{ route('shops.show',$advertisement->user_id) }}">@foreach($users as $user) {{ $user->name}} @endforeach</a></div>
                <p style="padding:20px;"></p>
@if(Entrust::hasRole(['Customer','Shopkeeper']) || !Auth::user())
<div class="col-sm-12"><form method="POST" action="{{route('advertisement.cart')}}">
                                            <input type="hidden" name="product_id" value="{{$advertisement->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="ads_price" value="{{ $advertisement->ads_price }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                        </form>
            </div>@endif </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
            <div class="media">
            <div class="media-left media-middle">
            <img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advertisement->ads_image. '.' . $advertisement->image_extension . '?'. 'time='. time() }}">
            </div>
            <div class="media-body">
                <div class="media-header"><h2>{{ $advertisement->ads_title }}</h2><h4><!-- @if ($advertisement->is_featured==0)
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
                &puncsp;&puncsp; --><span class="badge">
                Ksh&puncsp;{{ $advertisement->ads_price }}</span>
                </h4></div>
                <p>{{ $advertisement->ads_content }}</p>
                <p><!--<a class="btn btn-primary btn-xs" href="#">More &raquo;</a>-->&puncsp;&puncsp;</p>
            </div>
        </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>

@endsection