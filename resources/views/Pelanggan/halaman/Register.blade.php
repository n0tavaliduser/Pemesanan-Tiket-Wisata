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
                        <h6>Register Tiket Wisata</h6>
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
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                   
                </div>

                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="block-team-member-1 text-left rounded" style="border: 5px solid grey;">
                        <center><h2>Wisata Indonesia</h2><h6>
                            
                        </center>
                    </div>

                    <br><br>
                    <form enctype="multipart/form-data" class="" action="{{url('/AksiRegister')}}" method="post">

                        {{csrf_field()}}
    
                        <label><strong>Nama Pelanggan : </strong></label>
                        <input type="text" name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan">
                        <br>
                        @if ($errors->has('nama_pelanggan'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_pelanggan') }}</p></span>
                        @endif

                        <label><strong>Nomor Handphone : </strong></label>
                        <input type="text" name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone">
                        <br>
                        @if ($errors->has('no_hp'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('no_hp') }}</p></span>
                        @endif
                        
                        <label><strong>Email : </strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
                        <br>
                        @if ($errors->has('email'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('email') }}</p></span>
                        @endif

                        <label><strong>Password : </strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                        <br>
                        @if ($errors->has('password'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('password') }}</p></span>
                        @endif

                        <input type="submit" class="btn btn-primary" value="Buat Akun">
                    </form>
                    <hr>
                    <a href="{{url('/Login')}}"><h6 style="color: green">Sudah Punya Akun</h6></a>
                
                </div>


            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

<!-- content -->

@endsection