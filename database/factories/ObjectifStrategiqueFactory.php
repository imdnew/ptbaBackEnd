<?php

use Faker\Generator as Faker;

$factory->define(App\ObjectifStrategique::class, function (Faker $faker) {
    return [
        'code' => $faker->text(5),
        'libelle' => $faker->realText(45),
        'entite_id' => factory(\App\ObjectifStrategique::class)->create()->id
    ];
});
