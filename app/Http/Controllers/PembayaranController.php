<?php

namespace App\Http\Controllers;

use App\ModelTiket;
use App\ModelTempatWisata;
use App\ModelPemesanan;
use App\ModelPembayaran;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    public function index($id)     {  

        $tgl = Carbon::now()->format('Y-m-d');
        $pemesanan = ModelPemesanan::find($id);
        $tiket = ModelTiket::where('id_pemesanan',$id)->first();
        $tikets = ModelTiket::where('id_pemesanan',$id)->count();
        $besok = $pemesanan->created_at->addDays(1)->format('l, d F Y H:i');
    
        return view('Pelanggan.halaman.Pembayaran',compact('tiket','tikets','pemesanan','besok'));     
    }

    public function cariPembayaran(Request $request)
    {

        $query = $request->get('q');
        $pemesanan = ModelPemesanan::find($query);

        if (empty($pemesanan)) {
            return redirect('Pembayaran')->with('alert-danger','Id Pemesanan tidak ditemukan !');
        }else{
         
            return view('Pelanggan.halaman.Pembayaran', compact('pemesanan'));

        }


    }

    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'harga.digits_between' => ':attribute diisi antara 0 sampai 15 digit',
            'harga.min' => ':attribute tidak boleh kurang dari 0',
            'maks_tiket.min' => 'tiket tidak boleh kurang dari 0',
            'foto.max' => 'tidak boleh lebih 2 Mb'
        ];

    	$this->validate($request, [
    		'id_pemesanan' => 'required|max:100',
    		'nominal' => 'required|max:50',
            'bukti_tf' => 'required|image|max:2048',
    	], $messages);

        $file = $request->file('bukti_tf'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('pelanggan/assets/images/bukti_tf',$nama_file); // isi dengan nama folder tempat kemana file diupload

        $bayar = new ModelPembayaran();
        $bayar->id_pemesanan = $request->id_pemesanan;
        $bayar->nominal = $request->nominal;
        $bayar->status_bayar = 1;
        $bayar->bukti_tf = $nama_file;
    	$bayar->save();

        $pesan = ModelPemesanan::find($request->id_pemesanan);
        $pesan->status_pesan = 2;
        $pesan->save();

    	return redirect('/Pembayaran'.$request->id_pemesanan)->with('alert-success','Data berhasil ditambahkan!');
    }

}
