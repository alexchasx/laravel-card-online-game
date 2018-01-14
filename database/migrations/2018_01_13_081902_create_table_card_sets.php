<?php

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
            $table->string('set_name');
            $table->string('type')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('race_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('shirt')->comment('рубашка')->nullable();
            $table->string('background')->nullable();
            $table->string('border')->nullable();
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
