
<nav class="navbar navbar-expand fixed-top">
  <div class="navbar-brand d-none d-lg-block">
    <a href="index.html" class="text-white">SIE Purchase Order</a>
  </div>
  <div class="container-fluid p-0">
    <button id="tour-fullwidth" type="button" class="btn btn-default btn-toggle-fullwidth"><i class="ti-menu"></i></button>
    <div id="navbar-menu">
      <ul class="nav navbar-nav align-items-center">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-user"></i><span class="ml-1">Welcome, {{ ucwords(auth()->user()->name) }}</span></a>
          <ul class="dropdown-menu dropdown-menu-right logged-user-menu">
            <li><a href="#"><i class="ti-user"></i> <span>My Profile</span></a></li>
            <li><a href="appviews-inbox.html"><i class="ti-email"></i> <span>Message</span></a></li>
            <li><a href="#"><i class="ti-settings"></i> <span>Settings</span></a></li>
            <li><a href="{{ route('logout') }}"><i class="ti-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>