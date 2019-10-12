<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $users = User::pluck('id')->toArray();
    $posts = Post::pluck('id')->toArray();
    return [
        'post_id' => $posts[array_rand($posts)],
        'content' => $faker->paragraph(3),
        'user_id' => $users[array_rand($users)],
        'is_active' => true
    ];
});
