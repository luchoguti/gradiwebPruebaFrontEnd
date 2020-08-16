<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('vehicle', function (Blueprint $table) {
            $table->increments('id_vehicle');
            $table->text('number_license_plate');
            $table->unsignedInteger ('id_trademark');
            $table->foreign ('id_trademark')->references ('id_trademark')->on ('trademark')->onDelete ('cascade');
            $table->unsignedInteger ('id_type_vehicle');
            $table->foreign ('id_type_vehicle')->references ('id_type_vehicle')->on ('type_vehicle')->onDelete ('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists ('vehicle');
    }
}
