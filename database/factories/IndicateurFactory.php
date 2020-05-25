<?php

use Faker\Generator as Faker;

$factory->define(App\Indicateur::class, function (Faker $faker) {
    return [
        'libelle' => $faker->realText(15),
        'activite_id' => factory(\App\Activite::class)->create()->id
    ];
});
