@extends('admin.layout.TampilanAdmin')
@section('content')
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pembayaran</li>
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
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Id Pemesanan</th>
                        <th>Nominal</th>
                        <th>Bukti Transfer</th>
                        <th>Status Bayar</th>
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
                        <td>{{$no++}}</td>
                        <td>{{$tampil->id_pemesanan}}</td>
                        <td>{{$tampil->nominal}}</td>
                        <td>
                          <img width="150px" src="{{ url('pelanggan/assets/images/bukti_tf/'.$tampil->bukti_tf) }}">
                        </td>
                        <td>
                            @if ($tampil->status_bayar == 1)
                                <span>Menunggu Konfirmasi</span>
                            @elseif($tampil->status_bayar == 2)
                                <span>Selesai</span>
                            @elseif($tampil->status_bayar == 3)
                                <span>Batal</span>
                            @endif
                        </td>
                        <td>
                          @if ($tampil->status_bayar == '1')
                          <a class="btn btn-outline-success btn-sm" href="ValidasiBayar{{$tampil->id_pemesanan}}">
                              <i class="fas fa-check"></i>
                              Validasi
                          </a> 
                          <a class="btn btn-outline-danger btn-sm" href="BayarBatal{{$tampil->id_pemesanan}}">
                              <i class="fas fa-ban"></i>
                              Dibatalkan
                          </a>                                                                  
                          @endif
                       </td>
                        <td></td>
                      </tr>
                    </tbody>
                      @endforeach 
                  </table>
                </div>
              </div>
            </div>

        <!---Container Fluid-->
@endsection