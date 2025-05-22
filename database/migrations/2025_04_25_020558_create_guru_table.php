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
        Schema::create('guru', function (Blueprint $table) {
            $table->id('ID_Guru');
            $table->string('Nama_Guru');
            $table->string('username');
            $table->timestamps();

            
            $table->foreign('username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade'); 
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
