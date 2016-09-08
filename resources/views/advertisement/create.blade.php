@extends('layouts.master')

    @section('title','Advertise')

        @section('content')
        {!! Breadcrumb::withLinks(['Home' => '/', 'edit' => '/advertisement/edit', 'create']) !!}
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2 col-xs-12 margin-tb">
            <div class="pull-left">
                <h2>My Adverts</h2>
            </div>
            <div class="pull-right">
                @permission('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
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
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($advertisement as $advert => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $advert->ads_name }}</td>
        <td>{{ $advert->description }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @permission('role-edit')
            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endpermission
            @permission('role-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endpermission
        </td>
    </tr>
    @endforeach
    </table>
    {!! $roles->render() !!}
    </div>
@endsection