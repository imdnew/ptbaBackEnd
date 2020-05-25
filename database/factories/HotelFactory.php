<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
        'nom' => $faker->name,
        'adresse' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'siteweb' => $faker->text(30),
    ];
});
