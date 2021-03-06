<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">WBQMAFS</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fa fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="menu-header">Employee</li>
    <li class="{{ request()->route()->getName() === 'employee' ? 'class=active' : '' }}">
      <a href="{{ route('table.employee') }} " class="nav-link">
        <i class="fa fa-user-alt"></i>
        <span>Employee</span>
      </a>
    </li>
    <li class="menu-header">Account</li>
    <li class="{{ request()->route()->getName() === 'account' ? 'class=active' : '' }}">
      <a href="{{ route('table.account') }} " class="nav-link">
        <i class="fa fa-user-lock"></i>
        <span>Account</span>
      </a>
    </li>
    <li class="{{ request()->route()->getName() === 'account_record' ? 'class=active' : '' }}">
      <a href="{{ route('account.records') }} " class="nav-link">
        <i class="fa fa-address-book"></i>
        <span>Account Records</span>
      </a>
    </li>
    <li class="menu-header">Parameters</li>
    <li class="{{ request()->route()->getName() === 'water_parameter' ? 'class=active' : '' }}">
      <a href="{{ route('parameter.water') }} " class="nav-link">
        <i class="fa fa-hand-holding-water"></i> 
        <span>Water Parameters</span>
      </a>
      <a href="{{ route('parameter.temperature') }} " class="nav-link">
        <i class="fa fa-temperature-high"></i>
        <span>Temperature Parameters</span>
      </a>
      <a href="{{ route('parameter.ph') }} " class="nav-link">
        <i class="fa fa-flask"></i>
        <span>PH Parameters</span>
      </a>
      <a href="{{ route('parameter.turbidity') }} " class="nav-link">
        <i class="fa fa-glass-whiskey"></i>
        <span>Turbidity Parameters</span>
      </a>
    </li>
    <li class="menu-header">History</li>
    <li class="{{ request()->route()->getName() === 'history' ? 'class=active' : '' }}">
      <a href="{{ route('history') }} " class="nav-link">
        <i class="fa fa-history"></i>
        <span>History</span>
      </a>
    </li>
    @if(Auth::user()->can('manage-users'))
      <li class="menu-header">Users</li>
      <li class="{{ Request::route()->getName() == 'admin.users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users') }}">
          <i class="fa fa-users"></i>
          <span>Users</span>
        </a>
      </li>
    @endif
  </ul>
</aside>
