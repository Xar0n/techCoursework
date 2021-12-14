<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id()->comment('Первичный ключ');
            $table->dateTime('date_start')->nullable()->comment('Дата начала инвентаризации');
            $table->dateTime('date_end')->nullable()->comment('Дата окончания инвентаризации');
            $table->tinyInteger('basis')->comment('Основание для проведения');
            $table->integer('basis_number')->comment('Номер основания для проведения');
            $table->dateTime('basis_datetime')->comment('Дата основания для проведения');
            $table->boolean('in_works')->default(true)->comment('Инвентаризация еще продолжается');
            $table->unsignedBigInteger('inventory_reason_id')->comment('Причина инвентаризации');
            $table->unsignedBigInteger('creator_id')->comment('Создатель ведомости');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('inventory_reason_id')->references('id')->on('inventory_reasons');
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
        Schema::dropIfExists('lists');
    }
}
