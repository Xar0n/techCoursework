<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments_lists', function (Blueprint $table) {
            $table->id()->comment('Первичный ключ');
            $table->boolean('exist')->comment('Оборудование есть');
            $table->unsignedBigInteger('equipments_num_id')->comment('Инвентаризируемое оборудование');
            $table->unsignedBigInteger('list_id')->comment('Ведомость инвентаризации');
            $table->unsignedBigInteger('accepted_user_id')->comment('Пользователь принявши решение');
            $table->foreign('accepted_user_id')->references('id')->on('users');
            $table->foreign('equipments_num_id')->references('id')->on('equipments_nums');
            $table->foreign('list_id')->references('id')->on('lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments_lists');
    }
}
