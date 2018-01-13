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
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_name', 150);
            $table->string('avatar');
            $table->integer('ability1_id')->nullable();
            $table->integer('ability2_id')->nullable();
            $table->integer('energy')->nullable();
            $table->integer('attack')->nullable();
            $table->integer('health_points')->nullable();
            $table->integer('armor')->nullable();
            $table->enum('rarity', ['normal', 'rare', 'legendary']);
            $table->boolean('pay')->default(0);
            $table->boolean('hidden')->default(0);
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
