<?php

use App\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(File::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('target_id'); // Для MySQL 5.0 полиморф не работает
            $table->string('target_type'); // Для MySQL 5.0 метод foreign() не работает
            $table->boolean('status')->default(true);
            $table->string('path');
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
        Schema::dropIfExists(File::TABLE_NAME);
    }
}
