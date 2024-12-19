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
        Schema::table('training_programs', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->default(0); // Harga program
            $table->string('image')->nullable(); // Gambar program
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('training_programs', function (Blueprint $table) {
            $table->dropColumn(['price', 'image']);
        });
    }
};
