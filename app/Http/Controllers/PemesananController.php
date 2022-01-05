<?php

namespace App\Http\Controllers;

use App\ModelTiket;
use App\ModelTempatWisata;
use App\ModelPemesanan;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class PemesananController extends Controller
{
    public function index($id)     {  

        $tgl = Carbon::now()->format('Y-m-d');
        $jumlahtiket = ModelTiket::where('tanggal_wisata',$tgl)
        ->where('id_wisata',$id)
        ->count();

        $wisata = ModelTempatWisata::find($id);

        $sisaTiket = $wisata->maks_tiket - $jumlahtiket;
      
        return view('Pelanggan.halaman.FormTiketWisata',compact('wisata','sisaTiket'));     
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
    		'id' => 'required|max:100|unique:pemesanan',
    		'nama_pelanggan' => 'required|max:50',
            'id_wisata' => 'required',
            'id_pelanggan' => 'nullable',
            'tanggal_wisata' => 'required|date',
            'jumlah_tiket' => 'required|numeric|min:1',
    	], $messages);

        $wisata = ModelTempatWisata::find($request->id_wisata);

        $pesan = new ModelPemesanan();
        $pesan->id = $request->id;
        $pesan->id_pelanggan = $request->id_pelanggan;
        $pesan->nama_pelanggan = $request->nama_pelanggan;
        $pesan->id_wisata = $request->id_wisata;
        $pesan->tanggal_wisata = $request->tanggal_wisata;
        $pesan->jumlah_tiket = $request->jumlah_tiket;
        $pesan->jumlah_harga = $request->jumlah_tiket * $wisata->harga;
        $pesan->status_pesan = 1;
    	$pesan->save();
        $pesan->id;

        for ($i=0; $i < $request->jumlah_tiket; $i++) { 
            $tgl = Carbon::now()->format('Y-m-d');
            $NomorTiket = ModelTiket::where('tanggal_wisata',$request->tanggal_wisata)
            ->where('id_wisata',$request->id_wisata)
            ->count();

            $tiket = new ModelTiket();
            $tiket->id_pemesanan = $pesan->id;
            $tiket->id_wisata = $request->id_wisata;
            $tiket->nomor_tiket = $NomorTiket + 1;
            $tiket->tanggal_wisata = $request->tanggal_wisata;
            $tiket->status_tiket = 1;
            $tiket->save();
        }

    	return redirect('/Pembayaran'.$pesan->id)->with('alert-success','Data berhasil ditambahkan!');
    }

    public function detailPemesanan($id) {

        //if(!Session::get('login')){
        //   return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
        	$pemesanan = ModelPemesanan::find($id);
        	return view('pelanggan.halaman.DetailPemesanan',compact('pemesanan'));
        //}
    }

}
