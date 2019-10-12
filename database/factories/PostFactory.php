<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $users = User::pluck('id')->toArray();
    $categories = Category::pluck('id')->toArray();
    return [
        'title' => $faker->text(65),
        'content' => $faker->paragraph(100),
        'category_id' => $categories[array_rand($categories)],
        'user_id' => $users[array_rand($users)]
    ];
});
