<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRarities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rarities', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('avatar_id')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->softDeletes();
        });

        foreach ([
                     'Тестовая',
                     'Обычная',
                     'Необычная',
                     'Редкая',
                     'Очень редкая',
                     'Элитная',
                     'Шедевральная',
                     'Легендарная',
                 ] as $rarity) {
            DB::table('rarities')->insert([
                'name' => $rarity,
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
