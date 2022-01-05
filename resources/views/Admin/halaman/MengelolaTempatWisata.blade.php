@extends('admin.layout.TampilanAdmin')
@section('content')
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Tempat Wisata</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Wisata</li>
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="{{url('/admin/TambahTempatWisata')}}" class="btn btn-success">Tambah wisata</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Foto Utama</th>
                        <th>Nama Wisata</th>
                        <th>Harga</th>
                        <th>Maksimal Tiket</th>
                        <th>Alamat</th>
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
                        <td>
                            <img width="150px" src="{{ url('pelanggan/assets/images/fotowisata/'.$tampil->foto) }}">
                        </td>
                        <td>{{$tampil->nama_wisata}}</td>
                        <td>
                          @rupiah($tampil->harga)
                        </td>
                        <td>{{$tampil->maks_tiket}}</td>
                        <td>{{$tampil->alamat}}</td>
                        <td>
                          <a href="/admin/UbahTempatWisata{{$tampil->id}}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a href="/admin/HapusTempatWisata{{$tampil->id}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                      @endforeach 
                  </table>
                </div>
              </div>
            </div>

        <!---Container Fluid-->
@endsection