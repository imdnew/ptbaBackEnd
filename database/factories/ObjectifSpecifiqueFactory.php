<?php

use Faker\Generator as Faker;

$factory->define(App\ObjectifSpecifique::class, function (Faker $faker) {
    return [
        'code' => $faker->text(5),
        'libelle' => $faker->realText(45),
        'objectif_strategique_id' => factory(\App\ObjectifStrategique::class)->create()->id

    ];
});
