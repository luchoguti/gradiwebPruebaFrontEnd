<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    $faker->addProvider(new MattWells\Faker\Vehicle\Provider($faker));
    $trademark = App\Models\Trademark::query ()->selectRaw ('id_trademark')->inRandomOrder ()->first ();
    $type_vehicle = App\Models\TypeVehicle::query ()->selectRaw ('id_type_vehicle')->inRandomOrder ()->first ();
    return [
        'number_license_plate'=>$faker->vehicleLicensePlate,
        'id_trademark'=> $trademark->id_trademark,
        'id_type_vehicle' => $type_vehicle->id_type_vehicle
    ];
});
