<?php

$factory->define(Belt\Spot\Itinerary::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words(3, true),
        'heading' => $faker->words(random_int(1, 5), true),
        'body' => $faker->words(random_int(5, 20), true),
        'meta_title' => $faker->words(3, true),
        'meta_description' => $faker->paragraphs(1, true),
        'meta_keywords' => $faker->words(12, true),
    ];
});