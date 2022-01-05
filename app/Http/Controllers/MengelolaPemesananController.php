<?php

namespace App\Http\Controllers;

use App\ModelPemesanan;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class MengelolaPemesananController extends Controller
{
       public function index() {

        //if(!Session::get('LoginAdmin')){
            //return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
       // }
       // else{
            $tanggalwaktu = Carbon::now()->isoFormat('dddd, D MMMM Y');
            $datas = ModelPemesanan::all()->sortByDesc('created_at');

            $now = Carbon::now()->format('y-m-d');
            $batal = ModelPemesanan::all();

            foreach ($batal as $telatbayar) {
                    $selisihHari = $telatbayar->created_at->diffInDays($now);

                    if ($selisihHari >= 1  && $telatbayar->status_pesan == 1) {

                        $updetbatal = ModelPemesanan::find($telatbayar->id);
                        $updetbatal->status_pesan = 5;
                        $updetbatal->save();
                    }
            }

            foreach ($batal as $gkdiambil) {
                    $selisihHari = $gkdiambil->created_at->diffInDays($now);

                    if ($selisihHari >= 1  && $gkdiambil->status_pesan == 3 && $gkdiambil->metode_pembayaran == 2 ) {

                        $updetbatal = ModelPemesanan::find($gkdiambil->id);
                        $updetbatal->status_pesan = 5;
                        $updetbatal->save();
                    }
            }
            
            return view('Admin.halaman.MengelolaPemesanan',compact('datas','tanggalwaktu')); 
        //}
    }
 
    public function edit($id) {

        //if(!Session::get('login')){
            //return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

            $status = ModelPemesanan::find($id);
            return view('Admin.halaman.ubah_data.UbahPemesanan',compact('status'));
       // }
    }



    public function update($id, Request $request) {
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
            'status_pesan' => 'required|max:255',
        ]); 

        $datas = ModelPemesanan::find($id);
        $datas->status_pesan = $request->status_pesan;

        $datas->save();


        return redirect('/admin/MengelolaPemesanan')->with('alert-success','Data berhasil diubah!');
    }

    public function konfirmasi($id) {
        $datas = ModelPemesanan::find($id);
        $datas->status_pesan = '3';

        $datas->save();
        return redirect('/admin/MengelolaPemesanan')->with('alert-success','Data berhasil dikonfirmasi!');

    }
    public function dibatalkan($id) {
        $datas = ModelPemesanan::find($id);
        $datas->status_pesan = '5';

        $datas->save();
        return redirect('/admin/MengelolaPemesanan')->with('alert-success','Data berhasil dibatalkan!');

    }


}
