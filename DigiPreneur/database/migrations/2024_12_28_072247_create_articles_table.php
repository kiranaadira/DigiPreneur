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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            
            // Kolom untuk menyimpan judul artikel
            $table->string('title');

            // Kolom untuk menyimpan isi konten artikel (untuk artikel)
            $table->text('content')->nullable();

            // Kolom untuk jenis konten: video atau artikel
            $table->enum('type', ['video', 'article'])->default('article');

            // Kolom untuk URL video (jika type = video)
            $table->string('url')->nullable();

            // Kolom untuk kategori artikel (misalnya: SEO, Website, dll)
            $table->string('category');

            // Kolom status artikel: published atau draft
            $table->enum('status', ['published', 'draft'])->default('draft');

            // Kolom untuk tanggal publikasi
            $table->timestamp('published_at')->nullable();

            // Kolom untuk menyimpan penulis artikel
            $table->string('author')->nullable();

            // Kolom untuk menyimpan gambar thumbnail artikel
            $table->string('thumbnail')->nullable();

            // Kolom timestamps untuk created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
