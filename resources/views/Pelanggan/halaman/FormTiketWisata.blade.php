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
                        <h6>Pemesanan Tiket Wisata</h6>
                        <h2>{{$wisata->nama_wisata}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="block-team-member-1 text-left rounded" style="border: 5px solid grey; width: 400px;">
                        <center><h2>{{$wisata->nama_wisata}}</h2><hr>
                            <p class="px-3 mb-4 mt-3">
                                <img width="350px" src="{{ url('pelanggan/assets/images/fotowisata/'.$wisata->foto) }}">
                            </p>
                        </center>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="{{url('AksiPemesanan')}}" method="post">

                    {{csrf_field()}}

                    <label><strong>Id Pemesanan : </strong></label>
                        <input type="text" name="id" class="form-control" placeholder="Id Pemesanan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Id Pemesanan'" value=" S-{{ rand() }}" readonly>

                    <input type="text" name="id_wisata" value="{{$wisata->id}}" hidden>
                    
                    @if(Session::get('loginPelanggan'))
                        <input type="text" name="id_pelanggan" value="{{Session::get('id_pelanggan')}}" hidden>
                        <label><strong>Nama Pemesan : </strong></label>
                            <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukkan Nama" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Masukkan Nama'" value="{{Session::get('nama_pelanggan')}}">
                            @if ($errors->has('nama_pelanggan'))
                            <span class="text-danger"><p class="text-right">* {{$errors->first('nama_pelanggan') }}</p></span>
                            @endif
                    @else
                        <label><strong>Nama Pemesan : </strong></label>
                        <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukkan Nama" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Masukkan Nama'">
                        @if ($errors->has('nama_pelanggan'))
                        <span class="text-danger"><p class="text-right">* {{$errors->first('nama_pelanggan') }}</p></span>
                        @endif
                    @endif

                    <label><strong>Tanggal Berwisata : </strong></label>
                        <input type="date" class="form-control" name="tanggal_wisata" placeholder="Pilih Tanggal Wisata" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Pilih Tanggal Wisata'">
                        @if ($errors->has('tanggal_wisata'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('tanggal_wisata') }}</p></span>
                        @endif

                    <label><strong>Jumlah Tiket : </strong></label>
                        <input type="number" min="1" class="form-control" name="jumlah_tiket" placeholder="Jumlah Tiket" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Jumlah Tiket'">
                        <span style="color: blue">* Hari ini tersedia {{$sisaTiket}} Tiket</span>
                        @if ($errors->has('jumlah_tiket'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('jumlah_tiket') }}</p></span>
                        @endif
                    <br><hr>
                    <input type="submit" style="color: black" class="btn btn-warning" value="Pesan">
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

<!-- content -->

@endsection