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
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->boolean('hidden')->default(0);
            $table->softDeletes();
        });

        foreach ([
                     'Тестовая',
                     'Обычная',
                     'Необычная',
                     'Редкая',
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
