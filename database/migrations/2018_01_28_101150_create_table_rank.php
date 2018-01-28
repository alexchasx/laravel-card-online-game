<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('avatar_id')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->double('rating')->default(0);
            $table->integer('race_id')->default(2);
            $table->string('price')->nullable();
            $table->softDeletes();
        });

        foreach ([
                     'Рядовой',
                     'Ефрейтор',
                     'Младший сержант',
                     'Сержант',
                     'Старший сержант',
                     'Младший лейтенант',
                     'Лейтенант',
                     'Старший лейтенант',
                     'Капитан',
                     'Майор',
                     'Подполковник',
                     'Полковник',
                     'Генерал-майор',
                     'Генерал-лейтенант',
                     'Генерал-полковник',
                     'Генерал армии',
                     'Маршал СССР',
                 ] as $rank) {
            DB::table('ranks')->insert([
                'name' => $rank,
                'race_id' => 2,
            ]);
        }

        foreach ([
                     'Шутце',
                     'Обершутце',
                     'Ефрейтер',
                     'Оберъефрейтер',
                     'Унтерофицер',
                     'Унтерфельдфебель',
                     'Фельдфебель',
                     'Оберфельдфебель',
                     'Штабсфельдфебель',
                     'Лейтенант',
                     'Оберлейтенант',
                     'Гауптманн',
                     'Майор',
                     'Оберстлейтенант',
                     'Оберст',
                     'Генерал-майор',
                     'Генерал-лейтенант',
                     'Генерал',
                     'Генерал-оберст',
                     'Генерал-фельдмаршал',
                 ] as $rank) {
            DB::table('ranks')->insert([
                'name' => $rank,
                'race_id' => 1,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranks');
    }
}
