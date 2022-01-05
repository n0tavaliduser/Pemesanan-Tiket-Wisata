@extends('admin.layout.TampilanAdmin')
@section('content')
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Tempat Wisata</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pemesanan</li>
            </ol>
          </div>
          <hr>

           @if(\Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h6><i class="fas fa-sign-out-alt"></i><b> Success!!</b></h6>
                        {{Session::get('alert-success')}}
                    </div>
                  @endif
                  
          <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Pemesanan</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Status Pemesanan</th>
                                                <th>Pilih Opsi</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach($datas as $tampil)
                                            <tr>
                                                <th scope="row">{{$no++}}</th>
                                                <td>{{$tampil->id}}</td>
                                                <td>{{$tampil->nama_pelanggan}}</td>
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
                                        
                                                <td>
                                                    @if ($tampil->status_pesan == '2')
                                                    <a class="btn btn-outline-success btn-sm" href="AksiKonfirmasi{{$tampil->id}}">
                                                        <i class="fas fa-check"></i>
                                                        Konfirmasi
                                                    </a>                                         @elseif ($tampil->status_pesan == '3')
                                                    <a class="btn btn-outline-danger btn-sm" href="BatalPemesanan{{$tampil->id}}">
                                                        <i class="fas fa-ban"></i>
                                                        Dibatalkan
                                                    </a>
                                                    @endif
                                                 </td>
                                                <td>
                                                    <a href="UbahPemesanan{{$tampil->id}}" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                 </td>
                                            </tr>

                                    @endforeach       
                                            </tbody>
                                        </table>
                </div>
              </div>
            </div>

        <!---Container Fluid-->
@endsection