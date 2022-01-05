<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAdmin extends Model
{
    protected $table        = 'admin'; // nama tabel 
    protected $primaryKey   = 'id'; // primary key tabel 
    protected $fillable     = ['nama_admin', 
    							'email', 
    							'password', 
    							'no_hp']; //field tabel
}
