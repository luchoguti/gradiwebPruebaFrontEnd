<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Trademark;
use Faker\Generator as Faker;

$factory->define(Trademark::class, function (Faker $faker) {
    $faker->addProvider(new MattWells\Faker\Vehicle\Provider($faker));
    return [
        'name_mark' => $faker->vehicleMake
    ];
});
