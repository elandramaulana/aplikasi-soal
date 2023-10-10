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
        Schema::create('essay', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cpmk_id')->references('id')->on('cpmk')->onDelete('cascade');
            $table->string('question');
            $table->string('question_photo')->nullable();
            $table->integer('point');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('essay');
    }
};
