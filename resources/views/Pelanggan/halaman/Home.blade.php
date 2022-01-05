@extends('Pelanggan.layout.TampilanPelanggan')
@section('content')

<!-- content -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <div class="item">
            <div class="img-fill">
                <img src="pelanggan/assets/images/slide-01.jpg" alt="">
                <div class="text-content">
                  <h3>Selamat Datang di Wisata Indonesia</h3>
                  <h5>Pemesanan Tiket Online</h5>
                  <a href="#testimonials" class="main-filled-button">Pesan Tiket</a>
                  <a href="#" class="main-stroked-button">Buat Akun</a>                  
                </div>
            </div>
          </div>
          <!-- // Item -->
          <!-- Item -->
          <div class="item">
            <div class="img-fill">
                <img src="pelanggan/assets/images/slide-02.jpg" alt="">
                <div class="text-content">
                  <h3>Selamat Datang di Wisata Indonesia</h3>
                  <h5>Pemesanan Tiket Online</h5>
                  <a href="#testimonials" class="main-filled-button">Pesan Tiket</a>
                  <a href="#" class="main-stroked-button">Buat Akun</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
        </div>
    </div>
    <div class="scroll-down scroll-to-section"><a href="#projects"><i class="fa fa-arrow-down"></i></a></div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Projects Area Starts ***** -->
    <section class="section" id="projects">
      <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="section-heading">
                    <h6>Galeri</h6>
                    <h2>Kumpulan Galeri Tempat Wisata</h2>
                </div>
                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*">Semua</li>
                        @foreach ($galeri as $galeris)
                          <li data-filter=".{{$galeris->TempatWisata->id}}">{{$galeris->TempatWisata->nama_wisata}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="filters-content">
                    <div class="row grid">
                      @foreach ($galeri as $tampil)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all {{$tampil->TempatWisata->id}}">
                          <div class="item">
                            <a href="{{ url('pelanggan/assets/images/galeri/'.$tampil->nama_foto) }}" data-lightbox="image-1" data-title="Our Projects"><img src="{{ url('pelanggan/assets/images/galeri/'.$tampil->nama_foto) }}" alt=""></a>
                          </div>
                        </div>
                      @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- ***** Projects Area Ends ***** -->

    <!-- ***** Testimonials Starts ***** -->
    <section class="section" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h6 style="color: green">Wisata Indonesia</h6>
                        <h2 style="color: black">Pilihan Wisata di Indonesia</h2>
                    </div>
                </div>
                @foreach($tempatWisata as $wisata)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mobile-bottom-fix-big">
                    <div class="item author-item">
                        <div class="member-thumb">
                        <img src="{{ url('pelanggan/assets/images/fotowisata/'.$wisata->foto) }}" height="400" width="350" alt="">
                            <div class="hover-effect">
                                <div class="hover-content">
                                    <a href="/FormTiketWisata{{$wisata->id}}" class="main-filled-button">Pesan Tiket</a>
                                </div>
                            </div>
                        </div>
                        <h4 style="color: green">{{$wisata->nama_wisata}}</h4>
                        <span style="color: black">Harga Tiket : @rupiah($wisata->harga)</span><br>
                        <span style="color: black">Tersedia : 200 tiket / belum bisa</span>
                    </div>
                    <br><br>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ***** Testimonials Ends ***** -->
    
<!-- content -->

@endsection