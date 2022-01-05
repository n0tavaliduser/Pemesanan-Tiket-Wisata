<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelTempatWisata;
use App\ModelGaleri;

use Alert;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
    	$tempatWisata = ModelTempatWisata::all();
        $galeri = ModelGaleri::all();

    	return view('pelanggan.halaman.Home',compact('tempatWisata','galeri')); 
    }
}
