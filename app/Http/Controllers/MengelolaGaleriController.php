<?php

namespace App\Http\Controllers;

use App\ModelGaleri;
use App\ModelTempatWisata;
use Illuminate\Http\Request;
use Session;

class MengelolaGaleriController extends Controller
{
        public function index()     {  

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        $datas = ModelGaleri::get();         
        	return view('admin.halaman.MengelolaGaleri',compact('datas'));     
        }  
    }

    public function tambah() {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{
		
            $wisata = ModelTempatWisata::get();         

        	return view('admin.halaman.tambah_data.TambahGaleri',compact('wisata'));
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
    		'nama_wisata' => 'required|max:50',
    		'foto' => 'required|image|max:2048'
    	], $messages);


        $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('pelanggan/assets/images/galeri',$nama_file); // isi dengan nama folder tempat kemana file diupload

        $data = new ModelGaleri();
        $data->id_wisata = $request->nama_wisata;
        $data->nama_foto = $nama_file;

    	$data->save();
    	return redirect('/admin/MengelolaGaleri')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function edit($id) {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelGaleri::find($id);
        	return view('admin.halaman.ubah_data.UbahGaleri',compact('datas'));
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
            'nama_wisata' => 'required|max:50|unique:tempat_wisata',
            'foto' => 'required|image|max:2048'
        ], $messages);

        $datas = ModelTempatWisata::find($id_wisata);

        if (empty($request->nama_wisata)){
            $datas->nama_wisata = $datas->nama_wisata;
        }
        else {
            $datas->nama_wisata = $request->nama_wisata;
        }


        if (empty($request->nama_foto)){
            $datas->nama_foto = $datas->nama_foto;
        }
        else{
            unlink('pelanggan/assets/images/fotowisata/'.$datas->foto); //menghapus file lama
            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('pelanggan/assets/images/fotowisata',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $datas->foto = $nama_file;

        }
        $datas->save();
        return redirect('/admin/MengelolaGaleri')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id) {
    	$datas = ModelGaleri::find($id);
    	$datas->delete();
    	return redirect('/admin/MengelolaGaleri')->with('alert-success','Data berhasil dihapus!');
    }


}
