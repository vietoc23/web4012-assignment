<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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
    return [
        'name' => $faker->name,
        'birthday' => $faker->date('Y-m-d', '2010-01-01'),
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('123456'), // password
        'role' => $faker->numberBetween(1,2),
        'is_active' => $faker->boolean()
    ];
});
