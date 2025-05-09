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
        Schema::create('operator_departemen', function (Blueprint $table) {
            $table->id('IDOperator');
            $table->unsignedBigInteger('ID_Departemen');
            $table->unsignedBigInteger('id_user');
            $table->string('NamaOperatorDepartemen');

            $table->foreign('ID_Departemen')->references('ID_Departemen')->on('departemen')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operator_departemen');
    }
};
