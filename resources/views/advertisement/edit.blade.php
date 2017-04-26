 @extends('layouts.owner')

@section('title','Edit')

@section('content')
 {!! Breadcrumb::withLinks(['Home'   => '/',
                               'Advertisement' => '/advertisement',
                               "$advertisement->ads_image.$advertisement->image_extension"
                                ]) !!}

<div class="row">
	    <div class="col-lg-10 col-lg-offset-2 margin-tb">
	        <div class="pull-left">
	            <h2>Edit New Advert</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
	        </div>
	    </div>
	</div>
    Note: name and path values for the image cannot be changed.  If you wish to change these, then delete and create a new image:
<hr>
{!! Form::model($advertisement, ['route' => ['advertisement.update', $advertisement->id],
'method' => 'PATCH',
'class' => 'form',
'files' => true]
) !!}

    <!-- image name Form Input -->
    <div class="col-sm-4">
    <img class="media-object img-thumbnail" src="/uploadedimage/advertising/thumbnails/{{'thumb-' . $advertisement->ads_image. '.' . $advertisement->image_extension . '?'. 'time='. time() }}">
</div>
    <div class="col-sm-8">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Title" name="ads_title" required>
        </div>
        <div class="form-group">
        <select type="dropdown" class="form-control dropdown dropdown-toggle" id="category_id" name="category_id" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" required>
        <option value="">Select A Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->name }} </option>
        @endforeach
        </select>
</div>

<div class="form-group">
<select type="dropdown" class="form-control dropdown dropdown-toggle" name="type_id" id="type_id" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" required>

<option value="">First Select Category</option>
</select>
</div>
<div class="form-group">
<textarea class="form-control" placeholder="Description" maxlength="200" name="ads_content" value="" required></textarea>
</div>
<!--Image name form input -->
<div class="form-group">
<input class="form-control" type="number" name="ads_price" min="100" required id="price" placeholder="Price">
</div>
<!--Image name form input -->
<div class="form-group">
    <input class="form-control" type="text" name="ads_image" required placeholder="Image Name">
</div>
<!--is_active form input -->
<!-- <div class="form-group"><label for="is_active" class="col-md-4 control-label">Is Active:</label>
    <input type="checkbox" class="checkbox" name="is_active" value="1" id="is_active">
</div>
 --><!--is_featured form input -->
<!-- <div class="form-group"><label for="is_featured" class="col-md-4 control-label">Featured:</label>
    <input type="checkbox" class="checkbox" name="is_featured" value="1" id="is_featured">
</div>
 --><!--Form field for file -->
<div class="form-group"><label for="image" class="col-md-4 control-label">Primary Image</label>
<div class="col-md-6">
    <input type="file" name="image" value="" id="image" required>
</div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
        Edit
    </button>
</div>

  {!! Form::close() !!}
    <div>
        
    </div>
        {!! Form::model($advertisement, ['route' => ['advertisement.destroy', $advertisement->id],
        'method' => 'DELETE',
        'class' => 'form',
        'files' => true]
        ) !!}

            {!! Form::submit('Delete Advertisement', array('class'=>'btn btn-danger', 'Onclick' => 'ConfirmDelete();')) !!}

        {!! Form::close() !!}
@endsection
@section('scripts')
    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
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