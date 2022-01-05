<?php

namespace App\Http\Controllers;

use App\ModelTempatWisata;
use Illuminate\Http\Request;
use Session;

class MengelolaTempatWisataController extends Controller
{
        public function index()     {  

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        $datas = ModelTempatWisata::get();         
        	return view('admin.halaman.MengelolaTempatWisata',compact('datas'));     
        //}  
    }

    public function tambah() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
        	return view('admin.halaman.tambah_data.TambahTempatWisata');
        //}
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
    		'nama_wisata' => 'required|max:50|unique:tempat_wisata',
    		'alamat' => 'required|max:255',
    		'maks_tiket' => 'required|numeric|min:0|digits_between:0,5',
            'harga' => 'required|numeric|min:0|digits_between:0,15',
    		'foto' => 'required|image|max:2048'
    	], $messages);


        $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('pelanggan/assets/images/fotowisata',$nama_file); // isi dengan nama folder tempat kemana file diupload

        $data = new ModelTempatWisata();
        $data->nama_wisata = $request->nama_wisata;
        $data->alamat = $request->alamat;
        $data->maks_tiket = $request->maks_tiket;
        $data->harga = $request->harga;        
        $data->foto = $nama_file;

    	$data->save();
    	return redirect('/admin/MengelolaTempatWisata')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function edit($id) {

        if(!Session::get('login')){
            return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelTempatWisata::find($id);
        	return view('admin.halaman.ubah_data.UbahTempatWisata',compact('datas'));
        }
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
            'nama_wisata' => 'nullable|max:50|unique:tempat_wisata',
    		'alamat' => 'required|max:255',
    		'maks_tiket' => 'required|numeric|min:0|digits_between:0,5',
            'harga' => 'required|numeric|min:0|digits_between:0,15',
    		'foto' => 'nullable|image|max:2048'
        ], $messages);

        $datas = ModelTempatWisata::find($id);

        if (empty($request->nama_wisata)){
            $datas->nama_wisata = $datas->nama_wisata;
        }
        else {
            $datas->nama_wisata = $request->nama_wisata;
        }

        $datas->alamat = $request->alamat;
        $datas->maks_tiket = $request->maks_tiket;
        $datas->harga = $request->harga;

        if (empty($request->foto)){
            $datas->foto = $datas->foto;
        }
        else{
            unlink('pelanggan/assets/images/fotowisata/'.$datas->foto); //menghapus file lama
            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('pelanggan/assets/images/fotowisata',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $datas->foto = $nama_file;

        }
        $datas->save();
        return redirect('/admin/MengelolaTempatWisata')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id) {
    	$datas = ModelTempatWisata::find($id);
    	$datas->delete();
    	return redirect('/admin/MengelolaTempatWisata')->with('alert-success','Data berhasil dihapus!');
    }


}
