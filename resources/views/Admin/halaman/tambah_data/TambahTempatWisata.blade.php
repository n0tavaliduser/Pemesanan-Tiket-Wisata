@extends('admin.layout.TampilanAdmin')
@section('content')
      <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Tempat Wisata</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="{{url ('/admin/DashboardAdmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{url ('/admin/MengelolaTempatWisata')}}">Data Wisata</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data Tempat Wisata</li>            
            </ol>
          </div>
          <hr>
          <div class="row justify-content-center">
            <div class="col-lg-6">

              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Tempat Wisata</h6>
                </div>
                <div class="card-body">

                  <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="{{url('admin/AksiTambahTempatWisata')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>Nama Tempat Wisata</b></label>
                      <input type="text" class="form-control" name="nama_wisata" placeholder="Masukkan Nama Tempat Wisata">

                    @if ($errors->has('nama_wisata'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_wisata') }}</p></span>
                    @endif

                    </div>

                    <div class="form-group">
                      <label><b>Harga Tiket</b></label>
                      <input type="nummber" min="0" maxlength="15" class="form-control" name="harga" placeholder="Masukkan Harga">

                    @if ($errors->has('harga'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('harga') }}</p></span>
                    @endif

                    </div>

                    <div class="form-group">
                      <label><b>Maksimal Tiket Perhari</b></label>
                      <input type="nummber" min="0" maxlength="5" class="form-control" name="maks_tiket" placeholder="Masukkan Maksimal Tiket">

                    @if ($errors->has('maks_tiket'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('maks_tiket') }}</p></span>
                    @endif

                    </div>
                    <div class="form-group">
                      <label><b>Alamat</b></label>
                      <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>

                    @if ($errors->has('alamat'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                    @endif

                    </div>
                   
                    <div class="form-group">
                      <label><b>Foto Utama</b></label>
                      <input type="file" class="form-control" name="foto">
                      <span class="text-info">
                        <p class="text-left">- Ukuran Maksimal gambar 2 Mb</p>
                      </span>

                    @if ($errors->has('foto'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('foto') }}</p></span>
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
