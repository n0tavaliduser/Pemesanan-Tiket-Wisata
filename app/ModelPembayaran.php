<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPembayaran extends Model
{
    protected $table  = 'pembayaran';  //nama tabel
    protected $primaryKey   = 'id';  //primary key
    protected $fillable      = ['id_pemesanan', 
    							'nominal',
    							'bukti_tf',
                                'status_bayar',
                                'waktu']; //field tabel

    public function Pemesanan() { //pemesanan dimiliki oleh pembayaran
        return $this->belongsTo(ModelPemesanan::class);
        //nama_modelTabelrelasinya,foreignkey di tabel pembayaran
    }
}
