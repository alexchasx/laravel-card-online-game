<?php

use App\Comment;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Comment::TABLE_NAME, function(Blueprint $table) {
            $table->increments('id');
            $table->integer('target_id'); // Для MySQL 5.0 полиморф не работает
            $table->string('target_type');
            $table->integer('user_id')/*->unsigned()*/;
//            $table->foreign('user_id')->references('id')->on(User::TABLE_NAME);
            $table->text('content');
            $table->integer('level')->default(0); // Для создания дерева комментариев
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
        Schema::dropIfExists(Comment::TABLE_NAME);
    }
}