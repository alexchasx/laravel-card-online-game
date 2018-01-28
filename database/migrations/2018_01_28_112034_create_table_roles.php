<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('seen')->default(1);
            $table->string('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        foreach ([
                     'user',
                     'бот',
                     'paid_name',
                     'admin',
                     'manager',
                     'vip',
                 ] as $role) {
            DB::table('roles')->insert([
                'name' => $role,
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
