<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCardTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_types', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->boolean('hidden')->default(0);
            $table->softDeletes();
        });

        foreach ([
                     'Живая сила',
                     'Техника',
                     'Тактика',
                     'Энергетическое',
                     'Киборг',
                     'Биомасса',
                     'Массивное',
                     'Оружие',
                     'Наемник',
                     'Укрепление',
                 ] as $type) {
            DB::table('card_types')->insert([
                'name' => $type,
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
