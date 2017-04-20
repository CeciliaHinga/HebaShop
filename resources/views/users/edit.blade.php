{!! Form::model($users, ['route' => ['users.update', $users->id],'method' => 'PATCH','class' => 'form form-horizontal',
'files' => true]) !!}
            <div class="form-group">
<label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
<label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
<label for="inputName" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
<label for="inputName" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
        <label for="image" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-3">
             @if(!Auth::user()->name || !Auth::user()->image_extension)
               <strong><i class="fa fa-envelope"></i><span class="label label-danger">Please Upload an Avatar</span></strong>
              @else
            <img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . $users->name. '.' . $users->image_extension . '?'. 'time='. time() }}" class="img-circle" alt="User Image"/>
                     @endif</div>
                    <div class="col-sm-7">
                <input type="file" class="form-control" name="image" value="" id="image">
        </div>
        </div>
            <div class="form-group">
        <label for="image" class="col-sm-2 control-label">Role</label>
                    <div class="col-sm-10">
                {!! Form::select('roles[]',$userRole, array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
	{!! Form::close() !!}
<div class="pull-right"> 
    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $users->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}</div>
                </div></div>