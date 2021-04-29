
<nav class="navbar navbar-expand fixed-top">
  <div class="navbar-brand d-none d-lg-block">
    <a href="index.html" class="text-white">SIE Purchase Order</a>
  </div>
  <div class="container-fluid p-0">
    <button id="tour-fullwidth" type="button" class="btn btn-default btn-toggle-fullwidth"><i class="ti-menu"></i></button>
    <div id="navbar-menu">
      <ul class="nav navbar-nav align-items-center">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="ml-1">Selamat Datang, {{ ucwords(auth()->user()->name) }} &nbsp;</span><i class="ti-user"></i></a>
          <ul class="dropdown-menu dropdown-menu-right logged-user-menu">
            <li><a href="{{ route('dashboard.myProfile', Auth::user()) }}"><i class="ti-user"></i> <span>Profil Saya</span></a></li>
            <li><a href="{{ route('dashboard.myProfile.edit', Auth::user()) }}"><i class="ti-settings"></i> <span>Pengaturan</span></a></li>
            <li><a href="{{ route('logout') }}"><i class="ti-power-off"></i> <span>Keluar</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>