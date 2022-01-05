<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->string('id', 100)->primary();
            $table->unsignedBigInteger('id_pelanggan')->nullable();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->foreign('id_admin')->references('id')->on('admin')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nama_pelanggan',50);
            $table->unsignedBigInteger('id_wisata')->nullable();
            $table->foreign('id_wisata')->references('id')->on('tempat_wisata')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->date('tanggal_wisata');
            $table->string('jumlah_tiket',50);
            $table->string('jumlah_harga',50);
            $table->string('status_pesan',50);
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
        Schema::dropIfExists('pemesanan');
    }
}
