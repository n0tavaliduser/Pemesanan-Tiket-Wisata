<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPembayaran;
use App\ModelPemesanan;
use Session;

class MengelolaPembayaranController extends Controller
{
    public function index() {
        //if(!Session::get('LoginAdmin')){
         //   return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        	$datas = ModelPembayaran::all()->sortByDesc('created_at');
        	return view('Admin.halaman.MengelolaPembayaran',compact('datas')); 
        //}
    }

    public function validasiBayar($id) {
    	$byr = ModelPembayaran::where('id_pemesanan',$id)->first();
        $sewa = ModelPemesanan::find($id);

        $byr->status_bayar = 2;
        $byr->save();

        $sewa->status_pesan = 3;
        //$sewa->id_admin = Session::get('id_admin');
        $sewa->save();

        return redirect('admin/MengelolaPembayaran')->with('alert-success','Data berhasil divalidasi!');
    }

    public function bayarBatal($id) {
        $byr = ModelPembayaran::where('id_pemesanan',$id)->first();
        $sewa = ModelPemesanan::find($id)->first();

        $byr->status_bayar = 3;
        $byr->save();

        $sewa->status_pesan = 2;
        //$sewa->id_admin = Session::get('id_admin');
        $sewa->save();

        return redirect('admin/MengelolaPembayaran')->with('alert-success','Data Pembayaran berhasil dibatalkan!');
    }
}
