<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAchievements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('avatar')->nullable();
            $table->bigInteger('sort')->nullable();
            $table->double('rating')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->string('price')->nullable();
            $table->softDeletes();
        });

        DB::table('achievements')->insert([
            'name' => 'Воин',
            'description' => 'Одержал победу в 5-ти боях подряд',
        ]);

        DB::table('achievements')->insert([
            'name' => 'Бывалый',
            'description' => 'Сыграл 30 боёв',
        ]);

        DB::table('achievements')->insert([
            'name' => 'Матерый волк',
            'description' => 'Сыграл 100 боёв',
        ]);

        DB::table('achievements')->insert([
            'name' => 'Понюхавший пороха',
            'description' => 'Сыграл 10 боёв',
        ]);

        DB::table('achievements')->insert([
            'name' => 'Легенда',
            'description' => 'Достиг винрейта 70% при количестве боев более 100',
        ]);

        DB::table('achievements')->insert([
            'name' => 'Неудержимый',
            'description' => 'Одержал победу в 7-ми боях подряд',
        ]);

        DB::table('achievements')->insert([
            'name' => 'Unstoppable',
            'description' => 'Одержал победу в 10-ти боях подряд',
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
