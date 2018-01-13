<?php

use App\Article;
use App\ArticleTag;
use App\Tag;
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
$factory->define(ArticleTag::class, function (Faker $faker) {

    return [
        'article_id' => function () {
            return factory(Article::class)->create()->id;
        },
        'tag_id' => function () {
            return factory(Tag::class)->create()->id;
        },
    ];
});
