<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->string('feature')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->softDeletes();
        });

        foreach ([
                     'Германия',
                     'СССР',
                     'Франция',
                     'США',
                     'Китай',
                     'Япония',
                     'Великобритания',
                 ] as $race) {
            DB::table('races')->insert([
                'name' => $race,
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
