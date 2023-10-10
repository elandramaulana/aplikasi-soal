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
        Schema::create('paket_soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matkul_id')->constrained('matkul');
            $table->foreignId('cpmk_id')->constrained('cpmk');
            $table->json('objective_ids')->nullable(); // Kolom untuk array ID soal objective
            $table->json('essay_ids')->nullable(); // Kolom untuk array ID soal essay
            $table->integer('time');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_soal');
    }
};
