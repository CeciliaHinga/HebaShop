@extends('layouts.master')

@section('title','Home')
@section('modal')
<!-- Modal -->
@foreach($advertisement as $advert)
  <div class="modal fade" id="{{ $advert->id }}" role="dialog" aria-labelledby="admodallabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="fav-title">{{ $advert->ads_title }}</h4>&puncsp;&puncsp;
          Posted by:@foreach($advertisement as $rel) 
          @if($advert->user_id == $rel->user_id && $rel->id == $advert->id )
          <!-- <a href="{{ route('search', Input::get('query',"query=$advert->ads_title")) }}"> {{ $advert->name }}</a> -->
          <a href="{{ route('shops.show',$rel->user_id) }}">{{$advert->name}}</a>
          @endif @endforeach
        </div>
        <div class="col-sm-12 col-xs-12">
        <div class="modal-body">
<div class="col-xs-12 col-sm-12"><div class="col-sm-6 col-xs-12">
<img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advert->ads_image. '.' . $advert->image_extension . '?'. 'time='. time() }}">
</div>
<div class="col-sm-6 col-xs-12"><h3>Description
          <span class="badge">{{ $advert->ads_price }}</span></h3>
          {{ $advert->ads_content }}  </div>        
        </div> </div></div>
        <div class="modal-footer">
<div class="col-sm-6 col-xs-12"> <div>Related:</div> @foreach($advertisement as $rel) @if($rel->user_id == $advert->user_id && $advert->id !== $rel->id)
<a href="#{{ $advert->id }}" data-id="{{ $advert->id }}" data-toggle="modal" data-dismiss="modal" data-target="#{{ $rel->id }}">
<img class="img-thumbnail" width="60" height="60" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $rel->ads_image. '.' . $rel->image_extension . '?'. 'time='. time() }}"></a>
 @endif
@endforeach
</div>
<div class="col-sm-3 col-xs-12">
<form method="POST" action="{{route('advertisement.cart')}}">
                                            <input type="hidden" name="product_id" value="{{$advert->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

                @endif --></div><br>
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
@section('content')

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
    <div class="pagination">{{ $advertisement->links() }}</div>
<div class="container" id="advert">
<div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                @foreach($advertisement as $advert)
<div class="col-xs-12 col-sm-4">
<div class="row row-content"><br>
            <div class="media">
            <div class="media-left media-middle">
            <a href="#{{ $advert->id }}" data-id="{{ $advert->id }}" data-toggle="modal" data-target="#{{ $advert->id }}">
            @if(Entrust::hasRole('Shopkeeper'))<a href="/advertisement/{{ $advert->id }}">@endif
            <img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advert->ads_image. '.' . $advert->image_extension . '?'. 'time='. time() }}">
            </a>
                <p style="padding:5px;"></p>
                <h3 align=center>{{ $advert->ads_title }}</h3>
                   </div>
                </div>
                </div>          </div>      
                @endforeach
                
                
            </div>
            </div>
        </div>
                </div>
                <div class="loader"></div>
                </div>
                <div class="pagination">{{ $advertisement->links() }}</div>
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
                @foreach($advertisement as $advert)

    $(function(){
        $('#{{ $advert->id }}').on("show.bs.modal",function(e){
            $("#admodallabel").html($(e.relatedTarget).data('title'));
            $("#fav-title").html($(e.relatedTarget).data('title'));
            //$("#fav-title").html($(e.relatedTarget).data('title'));
        });
    });@endforeach

            </script>
@endsection