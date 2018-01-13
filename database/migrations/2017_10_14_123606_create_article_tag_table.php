<?php

use App\Article;
use App\ArticleTag;
use App\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ArticleTag::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')/*->unsigned()*/;
//            $table->foreign('article_id')->references('id')->on(Article::TABLE_NAME);
            $table->integer('tag_id')/*->unsigned()*/;
//            $table->foreign('tag_id')->references('id')->on(Tag::TABLE_NAME);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ArticleTag::TABLE_NAME);
    }
}
