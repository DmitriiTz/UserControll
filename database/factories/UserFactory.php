<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    $cities = \App\City::all()->pluck('id')->toArray();

    return [
        'first_name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'patronymic' => $faker->firstName,
        'email' => $faker->email,
        'city_id' => $faker->randomElement($cities),
    ];
});
