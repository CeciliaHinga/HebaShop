@extends('layouts.master')

    @section('title','Advertise')

        @section('content')
        {!! Breadcrumb::withLinks(['Home' => '/', 'My Adverts' => '/advertisement/create', 'create']) !!}       
    <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
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