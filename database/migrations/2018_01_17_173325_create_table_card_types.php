<?php

use Illuminate\Support\Facades\DB;
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
            $table->string('avatar')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->softDeletes();
        });

        foreach ([
                     'Лёгкий танк',
                     'Средний танк',
                     'Тяжёлый танк',
                     'ПТ-САУ',
                     'САУ',
                     'Событие',
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
