<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPelanggan extends Model
{
    protected $table        = 'pelanggan'; // nama tabel 
    protected $primaryKey   = 'id'; // primary key tabel 
    protected $fillable     = ['nama_pelanggan', 
    							'email', 
    							'password', 
    							'no_hp']; //field tabel
}
