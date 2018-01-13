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
$factory->define(Category::class, function (Faker $faker) {

    return [
        'target_id' => function () {
            return factory(Article::class)->create()->id;
        },
        'target_type' => 'App\Article',
        'user_id' =>function () {
            return factory(User::class)->create()->id;
        },
        'content' => $faker->text(200),
        'status' => true,
    ];
});
