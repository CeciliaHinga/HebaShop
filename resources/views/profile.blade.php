<!-- Profile Image -->
<header class="jumbotron">
<div class="box box-widget widget-user">
            <div class="widget-user-header bg-black" style="background: url('/uploadedimage/Screenshot 06.png') center center;">
    @if(Auth::user())
    <a href="{{ route('users.show',$users->id) }}">
            <h3 class="widget-user-username">{{ $users->name }}</h3><h5 class="widget-user-desc">
            @foreach ($users->roles as $role) {{ $role->display_name }}@endforeach</h5>
            </a>@else
                        <h3 class="widget-user-username">{{ $users->name }}</h3><h5 class="widget-user-desc">
            @foreach ($users->roles as $role) {{ $role->display_name }}@endforeach</h5>
            @endif
            </div>
            <!-- Main component for a primary marketing message or call to action -->
            <div class="widget-user-image">
            @if(!$users->name ||  !$users->image_extension)
               <img src="/pics/boxed-bg.jpg" class="profile-user-img img-responsive img-circle" alt="User Avatar"/>
              @else
            <img src="/uploadedimage/avatar/thumbnails/{{'thumb-' . $users->name. '.' . $users->image_extension . '?'. 'time='. time() }}" class="profile-user-img img-responsive img-circle" alt="User Avatar"/>
                     @endif</div>
                     <div class="box-footer">
                     <div class="row"><div class="col-sm-4 border-right"><div class="description-block">
                     	<h5 class="description-header">13,000</h5><span class="description-text">FOLLOWERS</span>
                     </div></div><div class="col-sm-4 border-right"><div class="description-block">
                     	<h5 class="description-header">{{$category}}</h5><span class="description-text">PRODUCTS</span>
                     </div></div><div class="col-sm-4 border-right"><div class="description-block">
                     	<h5 class="description-header">20</h5><span class="description-text">SALES</span>
                     </div>
                     </div> </div>
</div> </div>
</header>