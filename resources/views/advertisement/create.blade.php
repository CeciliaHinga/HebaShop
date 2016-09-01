@extends('layouts.master')

    @section('title','Advertise')

        @section('content')
        <div class="container">
        <div class="row">
        
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading">ADVERTISE</div>
        <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/advertise') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">{{ csrf_field() }}
        <div class="form-group">
        <label class="col-md-4 control-label">Title</label>
        <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Title" name="ads_title" value="">
        </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label">Category</label>
        <div class="col-md-6">
        <select type="dropdown" class="form-control dropdown dropdown-toggle" id="category_id" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <option value="">Select A Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" name="category_id"> {{ $category->name }} </option>
        @endforeach
        </select>
            </div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Type</label>
<div class="col-md-6">
<select type="dropdown" class="form-control dropdown dropdown-toggle" name="type_id" id="type_id" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

<option value="">First Select Category</option>
</select>
</div>
</div>
<div class="form-group"><label class="col-md-4 control-label">Description</label>
<div class="col-md-6">
    <textarea class="form-control" placeholder="Description" maxlength="200" name="ads_content" value=""></textarea>
</div>
</div>
<div class="form-group"><label class="col-md-4 control-label">Description</label>
<div class="col-md-6">
    <input type="file" name="ads_image" value="">
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

                            $('#type_id').append('<option value="' +subcatObj.id+'">'+ subcatObj.ads_type + '</option>');
                        });
                        });
            });
            </script>
    @endsection