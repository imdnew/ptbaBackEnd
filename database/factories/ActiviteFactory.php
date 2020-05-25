<?php

use Faker\Generator as Faker;

$factory->define(App\Activite::class, function (Faker $faker) {
    return [
        'code' => $faker->text(5),
        'activite' => $faker->realText(15),
        'cible' => $faker->randomNumber(1,TRUE),
        'cout_estimatif' => $faker->randomFloat(2),
        't1' => $faker->boolean(),
        't2' => $faker->boolean(),
        't3' => $faker->boolean(),
        't4' => $faker->boolean(),
        'contrainte_realisation' => $faker->realText(30),
        'objectif_specifique_id' => factory(\App\ObjectifSpecifique::class)->create()->id,
        'direction_id' => factory(\App\Direction::class)->create()->id,
    ];
});
