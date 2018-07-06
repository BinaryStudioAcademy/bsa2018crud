<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\ECurrency::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'short_name' => substr($faker->toUpper($faker->unique()->word), 0, 3),
        'actual_course' => $faker->randomFloat(5, 0, 2000),
        'actual_course_date' => $faker->dateTime(),
        'active' => $faker->boolean
    ];
});
