<div>
    <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle"
               src="{{ asset($user->image ?? 'admin/default/avatar-370-456322-1662765804.png') }}"
               alt="User profile picture">
        </div>
        <h3 class="profile-username text-center">{{$user->name}}</h3>
        <p class="text-muted text-center">{{$user->email}}</p>
      </div>
</div>
