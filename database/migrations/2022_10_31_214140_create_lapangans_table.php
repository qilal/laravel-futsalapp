<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id('id_lapangan_futsal');
            $table->string('nama');
            $table->string('link_alamat');
            $table->string('alamat');
            $table->string('gambar');
            $table->string('nomor_tlp');
            $table->string('jumlah_lapangan');
            $table->string('jumlah_bola');
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
        Schema::dropIfExists('lapangans');
    }
};
