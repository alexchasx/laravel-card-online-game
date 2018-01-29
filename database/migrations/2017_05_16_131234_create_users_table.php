<?php

use Illuminate\Support\Facades\DB;
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
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('avatar_id')->nullable();
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->integer('role_id')->default(1);
            $table->integer('card_set_id')->default(1);
            $table->integer('rank_id')->default(1);
            $table->tinyInteger('verified')->default(0);
            $table->string('email_token')->nullable();
            $table->double('rating')->default(0);
            $table->integer('count_wins')->default(0);
            $table->integer('count_battles')->default(0);
            $table->integer('prom')->default(0);
            $table->tinyInteger('vip')->default(0);
            $table->tinyInteger('seen')->default(1);
            $table->string('balance')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // сразу вставляем ботов
        foreach ([
                     'Вася',
                     'Колян',
                     'Wolfgang',
                     'Klaus',
                 ] as $user) {
            DB::table('users')->insert([
                'name' => $user,
                'password' => '1234567',
                'email' => rand(10, 9999),
                'role_id' => 2,
            ]);
        }

        // платные ники
        foreach ([
                     'Монстр',
                     'МегаМозг',
                     'Мегатрон',
                     'Вихрь',
                     'Терминатор',
                     'Детонатор',
                     'Ликвидатор',
                     'Каратель',
                     'Истребитель',
                     'Гладиатор',
                     'Танк',
                     'Кошмар',
                     'Тиранозавр',
                     'Гладиатор',
                     'Бессмертный',
                     'Убийца',
                     'Палач',
                     'Monster',
                     'MegaMosz',
                     'Megatron',
                     'Vortex',
                     'Terminator',
                     'Detonator',
                     'Liquidator',
                     'Chastener',
                     'Fighter',
                     'Gladiator',
                     'Tank',
                     'Nightmare',
                     'Tyrannosaur',
                     'Gladiator',
                     'Immortal',
                     'Assassin',
                     'Executioner',
                 ] as $user) {
            DB::table('users')->insert([
                'name' => $user,
                'password' => '1234567',
                'email' => rand(10, 9999),
                'role_id' => 3,
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
        Schema::dropIfExists('users');
    }
}