<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->integer('avatar_id')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->integer('card_sets_id')->nullable();
            $table->integer('race_id')->nullable();
            $table->integer('ability1_id')->nullable();
            $table->integer('ability2_id')->nullable();
            $table->integer('card_type_id')->nullable();
            $table->integer('energy')->nullable();
            $table->integer('attack')->nullable();
            $table->integer('health')->nullable();
            $table->integer('armor')->nullable();
            $table->integer('rarity_id')->default(1);
            $table->string('price')->nullable();
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
        //
    }
}
