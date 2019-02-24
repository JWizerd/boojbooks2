<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'author_id' => rand(10,100),
        'publication_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'description' => $faker->sentence,
        'pages' => rand(10,100)
    ];
});