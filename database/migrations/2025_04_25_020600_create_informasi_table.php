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
        Schema::create('informasi', function (Blueprint $table) {
            $table->id('IDInformasi');
            $table->unsignedBigInteger('IDOperator');
            $table->unsignedBigInteger('IDKategoriInformasi');
            $table->unsignedBigInteger('IDUser'); 
            $table->string('Judul');
            $table->text('Deskripsi');
            $table->string('Thumbnail');
            $table->date('TanggalPublikasi');
            $table->enum('TargetDepartemen', ['Umum', 'Khusus']); 
            $table->enum('Status', ['IsDeclined', 'IsAccepted', 'IsPending']);
        
            $table->foreign('IDOperator')->references('IDOperator')->on('operator_departemen')->onDelete('cascade');
            $table->foreign('IDKategoriInformasi')
             ->references('IDKategoriInformasi')
             ->on('kategori_informasi')
             ->onDelete('cascade');
            $table->foreign('IDUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};
