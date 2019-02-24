<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthday' => '2019-01-01',
        'biography' => $faker->sentence
    ];
});
