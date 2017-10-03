<?php

use Belt\Core\Helpers\FactoryHelper;
use Illuminate\Support\Str;

$factory->define(Belt\Spot\Place::class, function (Faker\Generator $faker) {

    if (!isset(FactoryHelper::$ids['teams'])) {
        FactoryHelper::$ids['teams'] = Belt\Core\Team::get(['id'])->pluck('id')->toArray();
    }

    return [
        'team_id' => $faker->randomElement(FactoryHelper::$ids['teams']),
        'is_active' => $faker->boolean(),
        'is_searchable' => $faker->boolean(),
        'template' => 'default',
        'name' => Str::title($faker->words(3, true)),
        'intro' => $faker->paragraphs(1, true),
        'body' => $faker->paragraphs(3, true),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'url' => $faker->url,
        'meta_title' => $faker->words(3, true),
        'meta_description' => $faker->paragraphs(1, true),
        'meta_keywords' => $faker->words(12, true),
        'rating' => rand(0, 5000) / 1000,
    ];
});