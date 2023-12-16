<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id('idberita');
            $table->unsignedBigInteger('idkategori');
            $table->foreign('idkategori')->references('idkategori')->on('kategori');
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita');
    }
};
