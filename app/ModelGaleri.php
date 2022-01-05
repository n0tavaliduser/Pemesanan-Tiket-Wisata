<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelGaleri extends Model
{
    protected $table  = 'galeri';  //nama tabel
    protected $primaryKey   = 'id';  //primary key
    protected $fillable      = ['id_wisata', 
    							'nama_foto']; //field tabel

    public function TempatWisata() { //pemesanan dimiliki oleh pembayaran
        return $this->belongsTo(ModelTempatWisata::class,'id_wisata');
        //nama_modelTabelrelasinya,foreignkey di tabel wisata
    }
}
