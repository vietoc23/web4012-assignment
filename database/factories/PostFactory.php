<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(65),
        'content' => $faker->paragraph(100),
        'category_id' => $faker->numberBetween(1, 5),
        'user_id' => $faker->numberBetween(1, 22)
    ];
});
