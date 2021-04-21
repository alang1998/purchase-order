<div id="sidebar-nav" class="sidebar">
  <nav>
    <ul class="nav" id="sidebar-nav-menu">
      <li class="panel">
        <li><a href="{{ route('dashboard') }}" class=""><i class="ti-home"></i> <span class="title">Dashboard</span></a></li>
      </li>
      <li class="menu-group">Master</li>
      <li class="panel">
        <li><a href="{{ route('pengguna') }}" class=""><i class="ti-user"></i> <span class="title">Pengguna</span></a></li>
        <li><a href="{{ route('region') }}" class=""><i class="ti-location-arrow"></i> <span class="title">Wilayah</span></a></li>
        <li><a href="{{ route('store') }}" class=""><i class="ti-home"></i> <span class="title">Cabang</span></a></li>
        <li><a href="{{ route('supplier') }}" class=""><i class="ti-truck"></i> <span class="title">Supplier</span></a></li>
        <li class="panel">
          
        <a href="#masterBarang" data-toggle="collapse" data-parent="#sidebar-nav-menu" aria-expanded="" class=""><i class="ti-package"></i> <span class="title">Barang</span> <i class="icon-submenu ti-angle-left"></i></a>
        <div id="masterBarang" class="collapse  ">
          <ul class="submenu">
            <li><a href="{{ route('unit') }}" class=""><i class="ti-package"></i>Unit</a></li>
            <li><a href="{{ route('brand') }}" class=""><i class="ti-package"></i>Merk</a></li>
            <li><a href="{{ route('item') }}" class=""><i class="ti-package"></i>Produk</a></li>
          </ul>
        </div>
        </li>        
      </li>

      <li class="menu-group">Pembelian</li>
      <li class="panel">
        <li><a href="{{ route('purchase_order') }}" class=""><i class="ti-shopping-cart"></i> <span class="title">Purchase Order ( PO )</span></a></li>
        <li><a href="#" class=""><i class="ti-clipboard"></i> <span class="title">Verifikasi PO</span></a></li>
      </li>
      <li class="menu-group">Laporan</li>
      <li class="panel">
        <li><a href=""><i class="ti-clipboard"></i> <span class="title">Rekap PO</span></a></li>
      </li>

      <li class="menu-group">Pengaturan</li>
      <li class="panel">
        <li><a href="{{ route('company') }}"><i class="ti-panel"></i><span class="title">Perusahaan</span></a></li>
        <li><a href="{{ route('role') }}"><i class="ti-panel"></i><span class="title">Wewenang</span></a></li>
      </li>
    </ul>
    <button type="button" class="btn-toggle-minified" title="Toggle Minified Menu"><i class="ti-arrows-horizontal"></i></button>
  </nav>
</div>