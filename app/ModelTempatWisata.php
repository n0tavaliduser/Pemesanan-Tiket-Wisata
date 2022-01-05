<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTempatWisata extends Model
{
    protected $table  = 'tempat_wisata';  //nama tabel
    protected $primaryKey   = 'id';  //primary key
    protected $fillable      = ['nama_wisata', 
    							'foto',
    							'alamat',
                                'maks_tiket']; //field tabel

    public function Galeri() { // 1 praktik memiliki banyak jadwal
        return $this->hasMany(ModelGaleri::class,'id_wisata');
    }
}
