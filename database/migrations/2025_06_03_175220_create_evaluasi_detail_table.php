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
        Schema::create('evaluasi_detail', function (Blueprint $table) {
            $table->bigIncrements('id_evl_dtl');
            $table->unsignedBigInteger('id_evaluasi');
            $table->unsignedBigInteger('id_kriteria');
            $table->integer('nilai'); // nilai kriteria 1 - 5
            $table->timestamps();

            $table->foreign('id_evaluasi')->references('id_evaluasi')->on('evaluasi')->onDelete('cascade');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_detail');
    }
};
