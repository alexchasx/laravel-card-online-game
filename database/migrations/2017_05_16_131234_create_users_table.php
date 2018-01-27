<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->enum('role', ['user', 'admin', 'manager'])->default('user');
            $table->boolean('verified')->default(0);
            $table->string('email_token')->nullable();
            $table->double('rating')->default(0);
            $table->integer('count_wins')->default(0);
            $table->integer('count_defeats')->default(0);
            $table->integer('prom')->default(0);
            $table->boolean('vip')->default(0);
            $table->rememberToken();
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}