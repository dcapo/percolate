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
        'roasted_at' => $faker->date(),
        'bean_id' => 1,
        'drying_time' => $faker->time('H:i:s', '00:03:00'),
        'maillard_time' => $faker->time('H:i:s', '00:03:00'),
        'development_time' => $faker->time('H:i:s', '00:03:00'),
        'drop_temperature' => $faker->randomFloat(1, 200, 500)
    ];
});

$factory->define(App\BrewStyle::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(30)
    ];
});

$factory->define(App\Brew::class, function (Faker\Generator $faker) {
    return [
        'brewed_at' => $faker->date(),
        'roast_id' => 1,
        'brew_style_id'=> 1
    ];
});

$factory->define(App\BrewReading::class, function (Faker\Generator $faker) {
    return [
        'brew_id' => 1,
        'temperature' => $faker->randomFloat(1, 200, 500),
        'time' => $faker->randomFloat(1, 0, 180)
    ];
});

$factory->define(App\Tasting::class, function (Faker\Generator $faker) {
    return [
        'tasted_at' => $faker->date(),
        'user_id' => 1,
        'brew_id' => 1,
        'overall_score' => $faker->numberBetween(1, 10),
        'dry_fragrance' => $faker->numberBetween(1, 10),
        'wet_aroma' => $faker->numberBetween(1, 10),
        'brightness' => $faker->numberBetween(1, 10),
        'flavor' => $faker->numberBetween(1, 10),
        'body' => $faker->numberBetween(1, 10),
        'finish' => $faker->numberBetween(1, 10),
        'sweetness' => $faker->numberBetween(1, 10),
        'clean_cup' => $faker->numberBetween(1, 10),
        'complexity' => $faker->numberBetween(1, 10),
        'uniformity' => $faker->numberBetween(1, 10)
    ];
});

$factory->define(App\TastingNote::class, function (Faker\Generator $faker) {
    return [
        'tasting_id' => 1,
        'name' => $faker->word
    ];
});

