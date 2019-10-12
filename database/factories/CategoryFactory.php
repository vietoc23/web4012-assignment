<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $users = User::pluck('id')->toArray();
    return [
        'user_id' => $users[array_rand($users)],
        'name' => $faker->text(65)
    ];
});
