<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id()->comment('Первичный ключ');
            $table->unsignedBigInteger('config_item_id')->comment('Наименование');
            $table->unsignedBigInteger('organization_id')->nullable()->comment('Организация');
            $table->unsignedBigInteger('view_id')->nullable()->comment('Вид');
            $table->unsignedBigInteger('grade_id')->nullable()->comment('Сорт');
            $table->unsignedBigInteger('group_id')->nullable()->comment('Группа');
            $table->unsignedBigInteger('room_id')->nullable()->comment('Склад/кабинет и адрес');
            $table->unsignedBigInteger('inventory_number_id')->nullable()->comment('Инвентарный номер');
            $table->foreign('config_item_id')->references('id')->on('config_items');
            $table->foreign('view_id')->references('id')->on('views');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('inventory_number_id')->references('id')->on('inventory_numbers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
