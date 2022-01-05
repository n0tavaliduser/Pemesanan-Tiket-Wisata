<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->id();
            $table->string('id_pemesanan',100);
            $table->foreign('id_pemesanan')->references('id')->on('pemesanan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('id_wisata');
            $table->foreign('id_wisata')->references('id')->on('tempat_wisata')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->BigInteger('nomor_tiket')->unsigned();
            $table->date('tanggal_wisata');
            $table->string('status_tiket',50);
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
        Schema::dropIfExists('tiket');
    }
}
