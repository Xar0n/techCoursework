<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_histories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Первичный ключ');
            $table->morphs('model');
            $table->integer('user_id')->unsigned()->nullable()->comment('Пользователь, который внес изменение');
            $table->string('user_type')->nullable();
            $table->string('message')->comment('Сообщение в истории');
            $table->text('meta')->nullable()->comment('История в формате JSON');
            $table->timestamp('performed_at')->comment('Когда было сделано действие');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_histories');
    }
}
