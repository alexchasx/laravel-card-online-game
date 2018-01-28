<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCardSets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_sets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type_id')->default(1);
            $table->integer('user_id')->nullable();
            $table->integer('race_id')->nullable();
            $table->integer('avatar_id')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->integer('shirt_id')->comment('рубашка')->nullable();
            $table->integer('background_id')->nullable();
            $table->integer('border_id')->nullable();
            $table->string('price')->nullable();
            $table->softDeletes();
        });

        foreach ([
                     'базовый',
                     'нестандартный',
                     'германский',
                     'советский',
                 ] as $set) {
            DB::table('card_sets')->insert([
                'name' => $set,
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
