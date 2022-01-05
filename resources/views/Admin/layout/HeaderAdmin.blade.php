<nav class="navbar navbar-expand navbar-dark bg-success topbar mb-4 static-top">
  <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
    <i class="fa fa-bars text-gray-800"></i>
  </button>
  <ul class="navbar-nav ml-auto">
    
    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
          <span class="ml-2 d-none text-white d-lg-inline small">{{Session::get('nama_admin')}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        
        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="{{ url ('/admin/Logout') }}">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
      
    </li>
  </ul>
</nav>