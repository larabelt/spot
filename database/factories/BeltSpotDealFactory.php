<?php

use Belt\Core\Helpers\FactoryHelper;

$factory->define(Belt\Spot\Deal::class, function (Faker\Generator $faker) {

    if (!isset(FactoryHelper::$ids['teams'])) {
        FactoryHelper::$ids['teams'] = Belt\Core\Team::get(['id'])->pluck('id')->toArray();
    }

    return [
        'team_id' => $faker->randomElement(FactoryHelper::$ids['teams']),
        'is_active' => $faker->boolean(),
        'is_searchable' => $faker->boolean(),
        'name' => $faker->words(random_int(1, 2), true),
        'intro' => $faker->paragraphs(1, true),
        'body' => $faker->paragraphs(3, true),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'url' => $faker->url,
        'meta_title' => $faker->words(3, true),
        'meta_description' => $faker->paragraphs(1, true),
        'meta_keywords' => $faker->words(12, true),
        'starts_at' => $faker->dateTimeBetween('-10 days', '+10 days'),
        'ends_at' => $faker->dateTimeBetween('+11 days', '+30 days'),
    ];
});