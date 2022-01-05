@extends('admin.layout.TampilanAdmin')
@section('content')
      <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Galeri</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="{{url ('/admin/DashboardAdmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{url ('/admin/MengelolaGaleri')}}">Data Galeri</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data Galeri</li>            
            </ol>
          </div>
          <hr>
          <div class="row justify-content-center">
            <div class="col-lg-6">

              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Galeri</h6>
                </div>
                <div class="card-body">

                  <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="{{url('admin/AksiTambahGaleri')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <select name = "nama_wisata" class="form-control">
                        <option value="">Pilih Nama Wisata</option>
                         @foreach($wisata as $tampil)
                         <option value="{{$tampil->id}}">{{$tampil->nama_wisata}}</option>
                         @endforeach
                      </select>

                    @if ($errors->has('nama_wisata'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_wisata') }}</p></span>
                    @endif

                    </div>
                   
                    <div class="form-group">
                      <label><b>Foto</b></label>
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
