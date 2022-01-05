<!DOCTYPE html>
<html>
<head>
	<title>Cetak Tiket</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('pelanggan/assets/css/bootstrap.min.css') }}">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <center>
                    <h2 style="color: green">Wisata Indonesia</h2>
                    <h4 style="color: black">Daftar tiket yang dipesan</h4>
                    <hr>
                </center>
            </div>
              
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
        </div>
    </div>


	<script>
		window.print();
	</script>
	
</body>
</html>