<?php

namespace App\Http\Controllers;

use App\ModelTiket;
use App\ModelTempatWisata;
use App\ModelPemesanan;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class TiketController extends Controller
{
    public function index($id_pemesanan)     {  

        $tgl = Carbon::now()->format('Y-m-d');
        $pemesanan = ModelPemesanan::find($id_pemesanan);
        $tiket = ModelTiket::where('id_pemesanan', $id_pemesanan)->get();
        $id_pemesanan = $id_pemesanan;

     
        return view('Pelanggan.halaman.Tiket',compact('tiket','pemesanan','id_pemesanan'));     
    }

    public function cariTiket(Request $request)
    {

        $query = $request->get('q');
        $tiket = ModelTiket::where('id_pemesanan', $query)->get();
        $id_pemesanan = $query;


        if (empty($tiket)) {
            return redirect('Tiket')->with('alert-danger','Id Pemesanan tidak ditemukan !');
        }else{
         
            return view('Pelanggan.halaman.Tiket', compact('tiket','id_pemesanan'));

        }


    }

    public function cetakTiket($id_pemesanan) {

        $tgl = Carbon::now()->format('Y-m-d');
        $pemesanan = ModelPemesanan::find($id_pemesanan);
        $tiket = ModelTiket::where('id_pemesanan', $id_pemesanan)->get();

     
        return view('Pelanggan.halaman.CetakTiket',compact('tiket','pemesanan'));
    }

}
