@extends('admin.layout.TampilanAdmin')
@section('content')
      <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Galeri</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="{{url ('/admin/DashboardAdmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{url ('/admin/MengelolaPemesanan')}}">Data Galeri</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data Galeri</li>            
            </ol>
          </div>
          <hr>
          <div class="row justify-content-center">
            <div class="col-lg-6">

              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Status Pemesanan</h6>
                </div>
                <div class="card-body">

                  <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="/admin/AksiUbahPemesanan{{$status->id}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <select name = "status_pesan" class="form-control">
                        <option value="">Status Pemesanan</option>
                         <option value="1"{{ ($status->status_pesan == "1") ? 'selected' : ''}}>Menunggu Pembayaran</option>
                         <option value="2"{{ ($status->status_pesan == "2") ? 'selected' : ''}}>Menunggu Konfirmasi</option>
                         <option value="3"{{ ($status->status_pesan == "3") ? 'selected' : ''}}>Belum Datang</option>
                         <option value="4"{{ ($status->status_pesan == "4") ? 'selected' : ''}}>Selesai</option>
                         <option value="5"{{ ($status->status_pesan == "5") ? 'selected' : ''}}>Dibatalkan</option>

                      </select>

                    @if ($errors->has('status_pesan'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('status_pesan') }}</p></span>
                    @endif

                    </div>

                    
                    <div class="form-group"> 
                        <input type="reset" class="btn btn-secondary"  value="Batal">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      <!---Container Fluid-->
@endsection
