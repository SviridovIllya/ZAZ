<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('type');
            $table->integer('door_count');
            $table->integer('seat_count');
            $table->string('fuel_type');
            $table->string('gear_box_type');
            $table->integer('price');
            $table->year('year');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('showroom_id')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
