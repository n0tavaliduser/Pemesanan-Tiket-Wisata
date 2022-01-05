<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelPelanggan;
use App\ModelPemesanan;

use Alert;
use Carbon\Carbon;
use Session;
use Hash;



class PelangganController extends Controller
{
    public function login()     {  

        if(Session::get('loginPelanggan')){
            return redirect('/')->with('alert-success','Anda sudah login');
        }
        else{

            return view('Pelanggan.halaman.Login');
        }
    }

    public function postLogin(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = ModelPelanggan::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_pelanggan',$data->id);
                Session::put('nama_pelanggan',$data->nama_pelanggan);
                Session::put('email',$data->email);
                Session::put('no_hp',$data->no_hp);
                
                Session::put('loginPelanggan',TRUE);
                return redirect('/');
            }
            else{
                return redirect('/Login')->with('alert-danger','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/Login')->with('alert-danger','Password atau Email, Salah!');
        }
    }

    public function register()     {  

        if(Session::get('loginPelanggan')){
            return redirect('/')->with('alert-success','Anda sedang login');
        }
        else{

            return view('Pelanggan.halaman.Register');
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
    		'nama_pelanggan' => 'required|max:50',
    		'email' => 'required|email|max:50|unique:pelanggan',
            'password' => 'required|max:255',
            'no_hp' => 'required|numeric',
    	], $messages);


        $data = new ModelPelanggan();
        $data->nama_pelanggan = $request->nama_pelanggan;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->no_hp = $request->no_hp;

    	$data->save();
    	return redirect('/Login')->with('alert-success','Data akun berhasil dibuat!');
    }

    public function logout(){
        Session::flush('loginPelanggan');
        return redirect('/Login')->with('alert-success','Anda sudah logout');
    }

    public function profil()     {  

        if(Session::get('loginPelanggan')){
            $Pelanggan = ModelPelanggan::find(Session::get('id_pelanggan'));
            $pesanan = ModelPemesanan::where('id_pelanggan',Session::get('id_pelanggan'))->get();
            return view('Pelanggan.halaman.Profil',compact('Pelanggan','pesanan')); 
        }
        else{
            return redirect('/Login')->with('alert-danger','Silahkan login!'); 
        }
    }

    public function index(){
    	$pelanggan = ModelPelanggan::all();
    	return view('pelanggan.halaman.Pelanggan',compact('pelanggan')); 
    }
}
