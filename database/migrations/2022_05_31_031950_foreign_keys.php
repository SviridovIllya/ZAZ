<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('showroom_id')->references('id')->on('showrooms');
        });
        Schema::table('managers', function (Blueprint $table) {
            $table->foreign('showroom_id')->references('id')->on('showrooms');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('showroom_id')->references('id')->on('showrooms');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign('services_showroom_id_foreign');
            $table->dropForeign('services_car_id_foreign');
        });
        Schema::table('managers', function (Blueprint $table) {
            $table->dropForeign('managers_showroom_id_foreign');
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign('cars_showroom_id_foreign');
            $table->dropForeign('cars_customer_id_foreign');
        });
    }
};
