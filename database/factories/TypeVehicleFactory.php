<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TypeVehicle;
use Faker\Generator as Faker;

$factory->define(TypeVehicle::class, function (Faker $faker) {
    $faker->addProvider(new MattWells\Faker\Vehicle\Provider($faker));
    return [
        'name_type_vehicle'=> $faker->vehicleModel
    ];
});
