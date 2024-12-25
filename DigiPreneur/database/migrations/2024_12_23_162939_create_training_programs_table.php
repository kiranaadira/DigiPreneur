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
        Schema::create('training_programs', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap program
            $table->string('title'); // Judul program
            $table->text('description'); // Deskripsi program
            $table->string('location'); // Lokasi program
            $table->date('start_date')->nullable(); // Tanggal mulai program
            $table->date('end_date')->nullable(); // Tanggal selesai program
            $table->time('start_time')->nullable(); // Waktu mulai program
            $table->time('end_time')->nullable(); // Waktu selesai program
            $table->string('status')->default('upcoming'); // Status program, default 'upcoming'
            $table->decimal('price', 10, 2)->default(0); // Harga program, default 0
            $table->string('image')->nullable(); // Gambar program
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_programs');
    }
};
