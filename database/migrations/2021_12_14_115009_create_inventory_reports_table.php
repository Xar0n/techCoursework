<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_reports', function (Blueprint $table) {
            $table->id()->comment('Первичный ключ');
            $table->unsignedBigInteger('list_id')->comment('Ведомость');
            $table->foreign('list_id')->references('id')->on('lists');
            $table->timestamp('created_at')->comment('Дата создания');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_reports');
    }
}
