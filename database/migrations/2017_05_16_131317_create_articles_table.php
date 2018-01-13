<?php

use App\Article;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Article::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('user_id')/*->unsigned()*/;
//            $table->foreign('user_id')->references('id')->on(User::TABLE_NAME);
            $table->text('description');
            $table->integer('viewed')->nullable(); // кол-во просмотров
            $table->string('keywords');
            $table->string('meta_desc');
            $table->integer('categories_id')/*->unsigned()*/;
//            $table->foreign('categories_id')->references('id')->on(Category::TABLE_NAME);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists(Article::TABLE_NAME);
    }
}
