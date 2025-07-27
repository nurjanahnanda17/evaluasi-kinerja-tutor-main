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
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->bigIncrements('id_evaluasi');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_tutor');
            $table->float('total_nilai'); // nilai akhir evaluasi tutor
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_tutor')->references('id_tutor')->on('tutors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi');
    }
};
