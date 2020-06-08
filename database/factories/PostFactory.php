<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $filePath = storage_path('images');
    return [
        'user_id'=>1,
        'post_image'=>'https://picsum.photos/500/300',
        'title'=>$faker->sentence(2),
        'body'=>$faker->paragraph(rand(10,15),true),
        'created_at'=>now(),
    ];
});
