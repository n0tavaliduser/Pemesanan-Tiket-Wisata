<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempatWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempat_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata',50);
            $table->string('foto',255);
            $table->BigInteger('harga')->unsigned();
            $table->string('alamat',255);
            $table->BigInteger('maks_tiket')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempat_wisata');
    }
}
