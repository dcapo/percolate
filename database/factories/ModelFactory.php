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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Bean::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(50),
        'origin' => $faker->country
    ];
});

$factory->define(App\Roast::class, function (Faker\Generator $faker) {
    return [
        'roasted_at' => $faker->dateTimeThisMonth(),
        'bean_id' => 1,
        'drying_time' => $faker->numberBetween(1000, 100000),
        'maillard_time' => $faker->numberBetween(1000, 100000),
        'development_time' => $faker->numberBetween(1000, 100000),
        'drop_temperature' => $faker->randomFloat(1, 200, 500)
    ];
});
