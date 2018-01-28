<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->text('content');
            $table->tinyInteger('seen')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('comments')->insert([
            'user_id' => 1,
            'content' => 'Раз. Два. Три. Тест. Самая первая запись.',
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'content' => 'Раз. Два. Три. Тест. Вторая запись',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
