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
        Schema::create('add_soals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_id');
            $table->string('foto')->nullable();
            $table->longText('soal')->nullable();
            $table->string('jawaban1')->nullable();
            $table->string('jawaban2')->nullable();
            $table->string('jawaban3')->nullable();
            $table->string('correctAnswer')->nullable();
            $table->longText('evaluasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_soals');
    }
};
