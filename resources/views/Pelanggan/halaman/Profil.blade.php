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
                        <h6>Profil Pelanggan</h6>
                        <h2>Wisata Indonesia</h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            @if(\Session::has('alert-danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{Session::get('alert-danger')}}
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{Session::get('alert-success')}}
                </div>
            @endif
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <div class="block-team-member-1 text-left rounded" style="border: 5px solid grey;">
                        <center><h2>Profil Pelanggan</h2><h6>
                            
                        </center>
                    </div>

                    <br><br>
                        <table>
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>&emsp;:&emsp;</td>
                                <td>{{$Pelanggan->nama_pelanggan}}</td>
                            </tr>
                            <tr>
                                <td><strong>Nomor Handphone</strong></td>
                                <td>&emsp;:&emsp;</td>
                                <td>{{$Pelanggan->no_hp}}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>&emsp;:&emsp;</td>
                                <td>{{$Pelanggan->email}}</td>
                            </tr>
                        </table>                
                </div>

                <div class="col-lg-6 col-md-6 col-xs-12">
                    
                </div>

            </div>
            <div class="row">
                <h2>Riwayat Wisata</h2>
                
            </div>
            <hr>
            <div class="row">
                <table border='1'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Wisata</th>
                            <th>Tanggal Wisata</th>
                            <th>Jumlah tiket</th>
                            <th>Jumlah Harga</th>
                            <th>Status Pemesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach($pesanan as $tampil)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$tampil->TempatWisata->nama_wisata}}</td>
                            <td>{{$tampil->tanggal_wisata}}</td>
                            <td>{{$tampil->jumlah_tiket}}</td>
                            <td>{{$tampil->jumlah_harga}}</td>
                            <td>
                                @if ($tampil->status_pesan == '1')
                                    <span class="badge badge-warning">Menunggu Pembayaran</span>
                                        @elseif ($tampil->status_pesan == '2')
                                            <span class="badge badge-info">Menunggu Konfirmasi</span>
                                        @elseif ($tampil->status_pesan == '3')
                                              <span class="badge badge-primary">Belum Datang</span>
                                        @elseif ($tampil->status_pesan == '4')
                                              <span class="badge badge-success">Selesai</span>
                                        @elseif ($tampil->status_pesan == '5')
                                              <span class="badge badge-danger">Dibatalkan</span>
                                        @endif   
                            </td>  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

<!-- content -->

@endsection