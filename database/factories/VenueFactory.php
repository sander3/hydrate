<?php

use Faker\Generator as Faker;

$factory->define(App\Venue::class, function (Faker $faker) {
    return [
        'name'        => $faker->company,
        'description' => $faker->paragraph,
        'latitude'    => $faker->latitude,
        'longitude'   => $faker->longitude,
    ];
});

$factory->state(App\Venue::class, 'expired', function ($faker) {
    return [
        'expired_at' => $faker->dateTime,
    ];
});
