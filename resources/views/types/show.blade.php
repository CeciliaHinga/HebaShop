@extends('layouts.app')

@section('title','Types')

@section('content')
<div class="container"><div class="row">@if(Entrust::hasRole('Shopkeeper'))
{!! Breadcrumb::withLinks(['Home' => '/',  'Advertise' => '/advertisement', 'Type' => '/types',  'Type' ])!!}
@else
{!! Breadcrumb::withLinks(['Home' => '/', 'Type' => '/types',"$advertisement->ads_type" ])!!}
@endif</div></div>
 <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@if ($categories)
               {{ $advertisement->ads_type }}
                @endif
                </div>
                <div class="pagination">{{ $categories->links() }}</div>
                <div class="panel-body">
                @foreach($categories as $advert)
<div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <div class="col-sm-12">
                <h3 align=center>{{ $advert->ads_title }}</h3>
                </div>
                &puncsp;&puncsp;
                <div class="col-sm-12">
                Posted by:
                <a href="{{ route('shops.show',$advert->user_id) }}"> {{ $advert->name }}</a></div>
                <p style="padding:20px;"></p>
                  @if(!Auth::user())
                  <div class="col-sm-12"><form method="POST" action="{{route('advertisement.cart')}}">
                                            <input type="hidden" name="product_id" value="{{$advert->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @if(Auth::user())                                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">@endif
                                            <input type="hidden" name="ads_price" value="{{ $advert->ads_price }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                        </form>
            </div> @elseif(Auth::user()->id == $advert->user_id)

@else 
<div class="col-sm-12"><form method="POST" action="{{route('advertisement.cart')}}">
                                            <input type="hidden" name="product_id" value="{{$advert->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @if(Auth::user())                                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">@endif
                                            <input type="hidden" name="ads_price" value="{{ $advert->ads_price }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                        </form>
            </div>@endif   <br><br>          </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
            <div class="media">
            <div class="media-left media-middle">
@if(Auth::user())            <a href="/advertisement/{{ $advert->id }}">@endif
            <img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advert->ads_image. '.' . $advert->image_extension . '?'. 'time='. time() }}">
            </a>
            </div>
            <div class="media-body">
                <div class="media-header"><h2>{{ $advert->ads_title }}</h2><h4><!-- @if ($advert->is_featured==0)
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
                @endif -->
                &puncsp;&puncsp;<span class="badge">
                Ksh&puncsp;{{ number_format($advert->ads_price, 2, '.', ',') }}</span>
                </h4></div>
                <p>{{ $advert->ads_content }}</p>
      <!--          <p><a class="btn btn-primary btn-xs" href="#">More &raquo;</a></p>-->
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