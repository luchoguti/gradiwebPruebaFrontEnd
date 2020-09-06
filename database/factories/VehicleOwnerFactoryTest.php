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
        'name'=>'Ardith',
        'number_identification'=>'89898293',
        'id_vehicle'=> $vehicle->id_vehicle
    ];
});
