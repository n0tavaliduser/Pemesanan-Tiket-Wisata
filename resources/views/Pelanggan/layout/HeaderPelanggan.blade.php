    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            Wisata Indonesia
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="{{ url('/#testimonials') }}">Pemesanan</a></li>
                            <li class="scroll-to-section"><a href="{{ url('/Pembayaran') }}">Pembayaran</a></li>
                            <li class="scroll-to-section"><a href="{{ url('/Tiket') }}">Tiket</a></li>
                            @if (Session::get('loginPelanggan') == True)
                                <li class="submenu"><a href="javascript:;">&emsp;&emsp; Selamat Datang, {{Session::get('nama_pelanggan')}}</a>
                                    <ul>
                                        <li><a href="{{url('/Profil')}}">Profil</a></li>
                                        <li><a href="{{url('/Logout')}}">Logout</a></li>
                                    </ul>
                                </li>   
                            @else
                                <li class="scroll-to-section">
                                    <a href="{{ url('/Login') }}">&emsp;&emsp;&emsp;&emsp; Masuk</a>
                                </li>
                                <div class="search-icon ">
                                    <a href="#qwed" class="main-button">&nbsp; Buat Akun &nbsp;</a>
                                </div>
                            @endif
                           
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

