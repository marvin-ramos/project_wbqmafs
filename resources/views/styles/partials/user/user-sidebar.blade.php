<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ Request::route()->getName() == 'user.dashboard' ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('user.dashboard') }}">
        <i class="fa fa-columns"></i>
        <span>Dashboard</span>
      </a>
    </li>
  </ul>
</aside>
