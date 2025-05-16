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
        Schema::create('targetdepartemen', function (Blueprint $table) {
            $table->id('IDTargetDepartemen');
            $table->unsignedBigInteger('ID_Departemen');
            $table->unsignedBigInteger('IDInformasi');
            $table->timestamps();
        
            $table->foreign('ID_Departemen')->references('ID_Departemen')->on('departemen')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('IDInformasi')
             ->references('IDInformasi')
             ->on('informasi')
             ->onDelete('cascade')
             ->onUpdate('cascade')
             ;
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targetdepartemen');
    }
};
