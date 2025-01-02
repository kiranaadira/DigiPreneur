<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerServicesTable extends Migration
{
    public function up()
{
    Schema::create('customer_services', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->text('message')->nullable();
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('customer_services');
    }
}
