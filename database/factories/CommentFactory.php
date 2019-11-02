<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 20),
        'content' => $faker->paragraph(3),
        'user_id' => $faker->numberBetween(1, 22),
        // 'is_active' => true
    ];
});
