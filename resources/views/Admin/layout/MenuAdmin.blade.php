<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <div class="sidebar-brand d-flex align-items-center justify-content-center bg-gradient-success">
        <div class="sidebar-brand-text">
          <img src="" width="70">
        </div>
        <div class="sidebar-brand-text">Wisata Indonesia</div>
      </div>
      <hr class="sidebar-divider my-0">

      <li class="nav-item {{ Request::is('admin/DasboardAdmin')? "active":""}}">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item {{ Request::is('admin/MengelolaTempatWisata')? "active":""}}">
        <a class="nav-link" href="{{url ('admin/MengelolaTempatWisata')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Tempat Wisata</span>
        </a>  
      </li>

     <li class="nav-item {{ Request::is('admin/MengelolaGaleri')? "active":""}}">
        <a class="nav-link" href="{{url ('admin/MengelolaGaleri')}}">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Galeri</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('admin/MengelolaPemesanan')? "active":""}}">
        <a class="nav-link" href="{{url ('admin/MengelolaPemesanan')}}">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Pemesanan</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('admin/MengelolaPembayaran')? "active":""}}">
        <a class="nav-link" href="{{url ('admin/MengelolaPembayaran')}}">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Pembayaran</span>
        </a>
      </li>

      <hr class="sidebar-divider">
            
    </ul>