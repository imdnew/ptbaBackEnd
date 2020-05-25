<?php

use Faker\Generator as Faker;

$factory->define(App\Trimestre::class, function (Faker $faker) {
    $id = $faker->randomNumber(1,TRUE);
    return [
        'code' => 'T'.$id.$faker->text(5),
        'libelle' => 'Trimestre '. $id. $faker->text(5),
    ];

});
