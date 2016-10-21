<<<<<<< HEAD
@extends('layouts.master')
=======
 @extends('layouts.master')
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

@section('title','Home')

@section('sidebar')

	@parent
  
    
@endsection
@section('content')

<<<<<<< HEAD
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="pagination">{{ $advertisement->links() }}</div>
=======
<div class="container">
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
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
            <a href="/advertisement/{{ $advert->id }}">
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
<<<<<<< HEAD
                <p><a class="btn btn-primary btn-xs" href="#" id="advert">More &raquo;</a></p>
            </div>
        </div>
                </div>
                </div>                
                @endforeach
                <div class="pagination">{{ $advertisement->links() }}</div>
=======
                <p><a class="btn btn-primary btn-xs" href="#">More &raquo;</a></p>
            </div>
        </div>
                </div>
                </div>
                @endforeach
                </div>
                </div>
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
                </div>
                </div>
                </div>
@endsection
<<<<<<< HEAD
@section('scripts')
    <script>

        $.(document).ready(function()
        {
                    $("#advert").click(function(){
            $("#advertModal").modal();
        });
        });

    </script>

@endsection
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
