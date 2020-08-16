<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\VehicleOwner::class, function (Faker $faker) {
    $vehicle = \App\Models\Vehicle::query ()
        ->selectRaw ('id_vehicle')
        ->inRandomOrder ()
        ->first ();
    return [
        'name'=>$faker->firstName,
        'number_identification'=>$faker->randomNumber (9),
        'id_vehicle'=> $vehicle->id_vehicle
    ];
});
