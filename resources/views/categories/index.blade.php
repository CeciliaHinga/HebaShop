@extends('layouts.app')

@section('title','Categories')

@section('modal')
<!-- Modal -->
@foreach($categories as $advert)
  <div class="modal fade" id="{{ $advert->id }}" role="dialog" aria-labelledby="admodallabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="fav-title">{{ $advert->ads_title }}</h4>&puncsp;&puncsp;Posted by:<a href="/advertisement/create"> {{ $advert->name}}</a>
<!--          &puncsp;&puncsp;Category:<a href="/categories/{{$advert->id}}"> {{ $advert->name}}</a>-->
        </div>
        <div class="col-sm-12 col-xs-12">
        <div class="modal-body">
<div class="col-xs-12 col-sm-12"><div class="col-sm-6 col-xs-12">
<img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advert->ads_image. '.' . $advert->image_extension . '?'. 'time='. time() }}">
</div>
<div class="col-sm-6 col-xs-12"><h3>Description
          <span class="badge">Ksh&puncsp;{{ number_format($advert->ads_price, 2, '.', ',') }}</span></h3>
          {{ $advert->ads_content }}  </div>        
        </div> </div></div>
        <div class="modal-footer">
<div class="col-sm-6 col-xs-12"> <div>Related:</div> @foreach($categories as $rel) @if($rel->user_id == $advert->user_id && $advert->id !== $rel->id)
<a href="#{{ $advert->id }}" data-id="{{ $advert->id }}" data-toggle="modal" data-dismiss="modal" data-target="#{{ $rel->id }}">
<img class="img-thumbnail" width="60" height="60" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $rel->ads_image. '.' . $rel->image_extension . '?'. 'time='. time() }}"></a>

 @endif
@endforeach
</div>       
<div class="col-sm-3 col-xs-12">@if(Entrust::hasRole(['Customer','Shopkeeper']) || !Auth::user())
<form method="POST" action="{{route('advertisement.cart')}}">
                                            <input type="hidden" name="product_id" value="{{$advert->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @if(Auth::user())                                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">@endif
                                            <input type="hidden" name="ads_price" value="{{ $advert->ads_price }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                        </form>
<!--           @if ($advert->is_featured==0)
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

                @endif -->@endif</div><br>

 <div class="col-sm-3 col-xs-12">          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection

@section('sidebar')

    @parent
  
    
@endsection
@section('content')<br>
<div class="container"><div class="row">@if(Entrust::hasRole('Shopkeeper'))
{!! Breadcrumb::withLinks(['Home' => '/',  'Advertise' => '/advertisement', 'categories'])!!}
@else
{!! Breadcrumb::withLinks(['Home' => '/', 'categories'])!!}
@endif</div></div>

        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-sm-6 pull-left">
                
            </div>
            <div class="pull-right">
                @permission('item-create')
                <a class="btn btn-success" href="{{ url('advertisement') }}"> Create New Advert</a>
                @endpermission
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="pagination">{{ $categories->links() }}</div>
<div class="container" id="advert">
<div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                @foreach($categories as $advert)
<div class="col-xs-12 col-sm-4">
<div class="row row-content"><br>
            <div class="media">
            <div class="media-left media-middle">
            <a href="#{{ $advert->id }}" data-id="{{ $advert->id }}" data-toggle="modal" data-target="#{{ $advert->id }}">
            @if(Entrust::hasRole('Shopkeeper'))<a href="/advertisement/{{ $advert->id }}">@endif
            <img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advert->ads_image. '.' . $advert->image_extension . '?'. 'time='. time() }}">
            </a>
                <p style="padding:5px;"></p>
                <h3 align=center>{{ $advert->ads_title }}  {{ $advert->ads_type }}</h3>
<!--                   &puncsp;&puncsp;Category:<a href="/categories/{{$advert->id}}"> {{ $advert->name}}</a>-->
                   </div>
                </div>
                </div>          </div>      
                @endforeach
                
                <div class="pagination">{{ $categories->links() }}</div>
            </div>
            </div>
        </div>
                </div>
                <div class="loader"></div>
                </div>
@endsection
@section('scripts')
    <script>
        function ajaxLoad(filename, content) {
        content = typeof content !== 'undefined' ? content : 'content';
        $('.loading').show();
        $.ajax({
            type: "GET",
            url: filename,
            contentType: false,
            success: function (data) {
                $("#" + content).html(data);
                $('.loading').hide();
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
    $(document).ready(function () {
        ajaxLoad('/');
    });
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
    @foreach($categories as $advert)
    $(function(){
        $('#{{ $advert->id }}').on("show.bs.modal",function(e){
            $("#admodallabel").html($(e.relatedTarget).data('title'));
            $("#fav-title").html($(e.relatedTarget).data('title'));
            //$("#fav-title").html($(e.relatedTarget).data('title'));
        });
    });@endforeach
            </script>
@endsection