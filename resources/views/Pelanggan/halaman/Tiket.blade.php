@extends('Pelanggan.layout.TampilanPelanggan')
@section('content')

<!-- content -->
    
        <!-- ***** Features Big Item Start ***** -->
        <section class="section" id="subscribe">
            <div class="container header-text" id="top">
                <hr>
                <br>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="section-heading">
                            <h6>Tiket Wisata</h6>
                            <h2>Wisata Indonesia</h2>
                        </div>
                        <div class="subscribe-content">
                            <div class="subscribe-form">
                                <form action="{{url('CariTiket')}}" method="get">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                          <fieldset>
                                            <input type="text" name="q" placeholder="Cari Id Pemesanan" required>
                                          </fieldset>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                          <fieldset>
                                            <button type="submit" class="main-button">Cari</button>
                                          </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Features Big Item End ***** -->
    
    <!-- ***** Testimonials Starts ***** -->
    <section class="section" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h6 style="color: green">Wisata Indonesia</h6>
                        <h2 style="color: black">Daftar tiket yang dipesan</h2>
                        <hr>
                        @if(isset($tiket))
                        <a href="/CetakTiket{{$id_pemesanan}}" class="btn btn-warning">Cetak Tiket</a>
                        @endif
                    </div>
                </div>
                
                @if(isset($tiket))
                    @foreach($tiket as $key => $value)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mobile-bottom-fix-big">
                        <div class="block-team-member-1 text-left rounded" style="border: 5px solid grey;">
                            <center><h2>Wisata Indonesia</h2><h6>{{$value->TempatWisata->nama_wisata}}<br></h6><hr>
                                <h1 style="color: green">{{$value->nomor_tiket}}</h1><hr>
                                <h6>{{$value->tanggal_wisata}}</h6><br>
                            </center>
                        </div>
                        <br><br>
                    </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- ***** Testimonials Ends ***** -->


<!-- content -->

@endsection