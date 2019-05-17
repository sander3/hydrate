<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'        => ucfirst($faker->word),
        'description' => $faker->sentence,
        'unit_price'  => $faker->randomFloat(2, 0, 20),
    ];
});
