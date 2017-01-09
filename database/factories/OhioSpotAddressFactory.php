<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Ohio\Spot\Address\Address::class, function (Faker\Generator $faker) {

    $types = ['places'];

    return [
        'addressable_id' => $faker->randomDigit,
        'addressable_type' => $faker->randomElement($types),
        'line1' => sprintf('/%s', $faker->slug),
        'delta' => 1,
    ];
});