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
        Schema::create('guideline', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul program
            $table->text('description'); // Deskripsi program
            $table->string('status');// Status program
            $table->string('image')->nullable(); // Gambar program
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guideline');
    }
};
