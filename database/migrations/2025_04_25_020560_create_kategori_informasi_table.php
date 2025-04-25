<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_informasi', function (Blueprint $table) {
            // $table->id('IDKategoriInformasi')->index();
            $table->id('IDKategoriInformasi');
            $table->string('NamaKategori');
            $table->string('Deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_informasi');
    }
};
