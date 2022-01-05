<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPemesanan extends Model
{
    public $incrementing = false;
    protected $table        = 'pemesanan'; // nama tabel 
    protected $primaryKey   = 'id'; // primary key tabel
    protected $keyType = 'string';
    protected $fillable     = ['id_pelanggan', 
    							'id_admin', 
    							'nama_pelanggan', 
    							'waktu',
    							'status_pesan']; //field tabel

    public function Admin() { //Penyewaan dimiliki oleh Admin
        return $this->belongsTo(ModelAdmin::class,'id_admin');
        //nama_modelTabelrelasinya,foreignkey di tabel pemesanan
    } 

    public function Pelanggan() { //Penyewaan dimiliki oleh User
        return $this->belongsTo(ModelPelanggan::class,'id_pelanggan');
        //nama_modelTabelrelasinya,foreignkey di tabel pemesanan
    }

    public function TempatWisata() { //Penyewaan dimiliki oleh User
        return $this->belongsTo(ModelTempatWisata::class,'id_wisata');
        //nama_modelTabelrelasinya,foreignkey di tabel pemesanan
    }

    public function Tiket() { // 1 praktik memiliki banyak jadwal
        return $this->hasMany(ModelTiket::class,'id_pemesanan');
    }

    public function Pembayaran() { //setiap 1 pembayaran memiliki 1 penyewaan
        return $this->hasOne(ModelPembayaran::class,'id_pemesanan');
        //nama_modelTabelrelasinya,foreignkey di tabel pembayaran
    }
}
