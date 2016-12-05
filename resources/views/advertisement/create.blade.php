@extends('layouts.master')

    @section('title','Advertise')

        @section('content')
        {!! Breadcrumb::withLinks(['Home' => '/', 'create' => '/advertisement', 'My Adverts']) !!}
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2 col-xs-12 margin-tb">
            <div class="pull-left">
                <h2>My Adverts</h2>
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
    <div class="col-sm-10 col-sm-offset-2">
    <table class="table table-bordered">
        <tr>
            <th></th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($advertisement as $advert)
    @if($advert->user_id==Auth::user()->id)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $advert->ads_title }}</td>
        <td>{{ $advert->ads_content}}</td>
        <td><img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advert->ads_image. '.' . $advert->image_extension . '?'. 'time='. time() }}"></td>
        <td>@if ($advert->is_featured==1) YES @else NO @endif</td>
        <td>@if ($advert->is_active==1)  YES @else NO @endif</td>
        <td>{{ $advert->ads_price}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('advertisement.show',$advert->id) }}">Show</a>
            @permission('item-edit')
            <a class="btn btn-primary" href="{{ route('advertisement.edit',$advert->id) }}">Edit</a>
            @endpermission
            @permission('item-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['advertisement.destroy', $advert->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endpermission
        </td>
    </tr>
    @endif
    @endforeach
    </table>
    {!! $advertisement  ->render() !!}
    </div>
@endsection
        