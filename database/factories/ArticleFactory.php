<?php

use App\Article;
use App\Category;
use App\User;
use Faker\Generator as Faker;

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
$factory->define(Article::class, function (Faker $faker) {

    return [
        'title' => $faker->text(50),
        'content' => $faker->text(300),
        'user_id' =>function () {
            return factory(User::class)->create()->id;
        },
        'description' => $faker->text(300),
        'viewed' =>  rand(0, 200000),
        'keywords' => $faker->text(50),
        'meta_desc' => $faker->text(50),
        'categories_id' => function () {
            return factory(Category::class)->create()->id;
        },
        'status' => true,
    ];
});
