<form class="form-inline mr-auto" action="">
</form>
<ul class="navbar-nav navbar-right">
  <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg{{ $history ? ' beep' : '' }}"><i class="far fa-bell"></i></a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
      <div class="dropdown-header">Notifications
        <div class="float-right">
          <a href="#">Mark All As Read</a>
        </div>
      </div>
      <div class="dropdown-list-content dropdown-list-icons">
        @if($history)
        @for($i = 1; $i < 40; $i++)
        <a href="#" class="dropdown-item dropdown-item-unread">
          <div class="dropdown-item-icon bg-primary text-white">
            <i class="fas fa-code"></i>
          </div>
          <div class="dropdown-item-desc">
            Template update is available now!
            <div class="time text-primary">2 Min Ago</div>
          </div>
        </a>
        @endfor
        @else
        <p class="text-muted p-2 text-center">No notifications found!</p>
        @endif
    </div>
  </li>
  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <div class="d-sm-none d-lg-inline-block">Hi, {{ optional($user->employee)->firstname }}</div></a>
    <div class="dropdown-menu dropdown-menu-right">
      <div class="dropdown-title">
        Welcome, {{ optional($user->employee)->firstname }} {{ optional($user->employee)->middlename }} {{ optional($user->employee)->lastname }}<br>
        You Logged as: {{ optional($user->role)->role_name }}
      </div>
      <a href="{{ route('user.profile') }}" class="dropdown-item has-icon">
        <i class="far fa-user"></i> Profile
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ route('user.activities') }}" class="dropdown-item has-icon">
        <i class="fas fa-sign-out-alt"></i> Activities
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ route('logout.user') }}" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </li>
</ul>
