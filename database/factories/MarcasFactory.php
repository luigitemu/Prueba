<?php

use Faker\Generator as Faker;

$factory->define(App\Marca::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->unique()->company,
        'Codigo' => $faker->unique()->randomNumber(5),
    ];
});
