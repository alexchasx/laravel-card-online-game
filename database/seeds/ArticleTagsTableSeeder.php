<?php

use App\Article;
use App\ArticleTag;
use Illuminate\Database\Seeder;

class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ArticleTag::class, 10)->create();
    }
}
