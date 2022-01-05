<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelAdmin;
use App\ModelGaleri;

use Alert;
use Carbon\Carbon;
use Session;
use Hash;

class LoginAdminController extends Controller
{
    public function login()     {  

        if(Session::get('loginAdmin')){
            return redirect('/admin/MengelolaPemesanan')->with('alert-success','Anda sudah login');
        }
        else{

            return view('Admin.halaman.LoginAdmin');
        }
    }

    public function postLogin(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = ModelAdmin::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_admin',$data->id);
                Session::put('nama_admin',$data->nama_admin);
                Session::put('no_hp',$data->no_hp);
                Session::put('email',$data->email);
                
                Session::put('LoginAdmin',TRUE);
                return redirect('/admin/MengelolaPemesanan');
            }
            else{
                return redirect('admin/LoginAdmin')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('admin/LoginAdmin')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush('loginAdmin');
        return redirect('admin/LoginAdmin')->with('alert-success','Anda sudah logout');
    }
}
