<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_pemesanan',100);
            $table->foreign('id_pemesanan')->references('id')->on('pemesanan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->BigInteger('nominal')->unsigned();
            $table->string('bukti_tf',255);
            $table->string('status_bayar',50);
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
        Schema::dropIfExists('pembayaran');
    }
}
