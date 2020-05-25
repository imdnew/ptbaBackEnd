<?php

use Faker\Generator as Faker;

$factory->define(App\Exercice::class, function (Faker $faker) {
    $year = $faker->year();
    return [
        'date_debut' => \Carbon\Carbon::createFromDate($year,01,01,null),
        'date_fin' => \Carbon\Carbon::createFromDate($year,12,31,null),
        'annee' => $year,
        'entite_id' => factory(\App\ObjectifStrategique::class)->create()->id
    ];
});
