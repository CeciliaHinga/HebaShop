 @extends('layouts.master')

@section('title','Home')

@section('sidebar')

	@parent
  
    
@endsection
@section('content')

{!! Form::model($marketingImage, ['route' => ['marketingimage.update', $marketingImage->id],
'method' => 'PATCH',
'class' => 'form',
'files' => true]
) !!}

@endsection