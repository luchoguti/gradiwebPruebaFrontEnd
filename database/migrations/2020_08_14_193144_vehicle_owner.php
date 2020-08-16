<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VehicleOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('vehicle_owner', function (Blueprint $table) {
            $table->increments('id_vehicle_owner');
            $table->text ('name');
            $table->bigInteger ('number_identification');
            $table->unsignedInteger ('id_vehicle');
            $table->foreign ('id_vehicle')->references ('id_vehicle')->on ('vehicle')->onDelete ('cascade');
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
        Schema::dropIfExists ('vehicle_owner');
    }
}
