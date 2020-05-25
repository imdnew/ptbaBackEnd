<?php

use Faker\Generator as Faker;

$factory->define(App\ObjectifStrategique::class, function (Faker $faker) {
    return [
        'sigle' => $faker->text(5),
        'nom' => $faker->realText(15),
    ];
});
