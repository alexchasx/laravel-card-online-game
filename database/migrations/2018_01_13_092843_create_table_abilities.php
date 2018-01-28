<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->integer('avatar_id')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->string('description')->nullable();
            $table->text('full_description')->nullable();
            $table->softDeletes();
        });

        foreach ([
                     'Маскировка',
                     'Разведчик',
                     'Сплэш',
                     'Фугас',
                     'Таран',
                     'Крепкая башня',
                     'Барабанное орудие',
                     'Рывок',
                     'Заслон',
                     'Взвод',
                 ] as $ability) {
            DB::table('abilities')->insert([
                'name' => $ability,
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
        //
    }
}
