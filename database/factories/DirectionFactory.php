<?php

use Faker\Generator as Faker;

$factory->define(App\Direction::class, function (Faker $faker) {
    return [
        'sigle' => $faker->text(5),
        'nom' => $faker->realText(15),
        'entite_id' => factory(\App\ObjectifStrategique::class)->create()->id
    ];
});
