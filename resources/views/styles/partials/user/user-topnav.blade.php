<form class="form-inline mr-auto" action="">
</form>
<ul class="navbar-nav navbar-right">
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
      <a href="{{ route('user.change.password') }}" class="dropdown-item has-icon">
        <i class="fas fa-tools"></i> Change Password
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ route('logout.user') }}" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </li>
</ul>
