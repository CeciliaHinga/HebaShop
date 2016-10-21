@extends('layouts.master')

    @section('title','Advertise')

        @section('content')
<<<<<<< HEAD
        {!! Breadcrumb::withLinks(['Home' => '/', 'create' => '/advertisement', 'My Adverts']) !!}
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2 col-xs-12 margin-tb">
            <div class="pull-left">
                <h2>My Adverts</h2>
            </div>
            <div class="pull-right">
                @permission('role-create')
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
            @permission('role-edit')
            <a class="btn btn-primary" href="{{ route('advertisement.edit',$advert->id) }}">Edit</a>
            @endpermission
            @permission('role-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['advertisement.destroy', $advert->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endpermission
        </td>
    </tr>
    @endforeach
    </table>
    {!! $advertisement  ->render() !!}
    </div>
@endsection
=======
        {!! Breadcrumb::withLinks(['Home' => '/', 'edit' => '/advertisement/edit', 'create']) !!}

        <div class="container">
        <div class="row">
        
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading">ADVERTISE</div>
        <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/advertisement') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">{{ csrf_field() }}
        <div class="form-group">
        <label class="col-md-4 control-label">Title</label>
        <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Title" name="ads_title" required>
        </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label">Category</label>
        <div class="col-md-6">
        <select type="dropdown" class="form-control dropdown dropdown-toggle" id="category_id" name="category_id" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" required>
        <option value="">Select A Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->name }} </option>
        @endforeach
        </select>
            </div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Type</label>
<div class="col-md-6">
<select type="dropdown" class="form-control dropdown dropdown-toggle" name="type_id" id="type_id" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" required>

<option value="">First Select Category</option>
</select>
</div>
</div>
<div class="form-group"><label class="col-md-4 control-label">Description</label>
<div class="col-md-6">
    <textarea class="form-control" placeholder="Description" maxlength="200" name="ads_content" value="" required></textarea>
</div>
</div>
<!--Image name form input -->
<div class="form-group"><label class="col-md-4 control-label">Price</label>
<div class="col-md-6">
    <input class="form-control" type="number" name="ads_price" min="100" required id="price">
</div>
</div>
<!--Image name form input -->
<div class="form-group"><label class="col-md-4 control-label">Image Name</label>
<div class="col-md-6">
    <input class="form-control" type="text" name="ads_image" required>
</div>
</div>
<!--is_active form input -->
<div class="form-group"><label for="is_active" class="col-md-4 control-label">Is Active:</label>
<div class="col-md-1">
    <input type="checkbox" class="checkbox" name="is_active" value="1" id="is_active">
</div></div>
<!--is_featured form input -->
<div class="form-group"><label for="is_featured" class="col-md-4 control-label">Featured:</label>
<div class="col-md-1">
    <input type="checkbox" class="checkbox" name="is_featured" value="1" id="is_featured">
</div>
</div>
<!--Form field for file -->
<div class="form-group"><label for="image" class="col-md-4 control-label">Primary Image</label>
<div class="col-md-6">
    <input type="file" name="image" value="" id="image" required>
</div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
        Create
    </button>
</div>
</div>
</form>
</div>
</div>
</div>

</div>
</div>

@endsection
    @section('scripts')
    <script>
        $('#category_id').on('change', function(e){

            var cat_id = e.target.value;

            //ajax

                $.get('/api/category-dropdown?cat+id=' + cat_id, function(data){

                //success data
                    $('#type_id').empty();

                        $('#type_id').append('<option value="">Please choose one</option>');

                            $.each(data, function(index, subcatObj)
                            {

                            $('#type_id').append('<option value="' +subcatObj.id+'" required>'+ subcatObj.ads_type + '</option>');
                        });
                        });
            });
            </script>
    @endsection
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
