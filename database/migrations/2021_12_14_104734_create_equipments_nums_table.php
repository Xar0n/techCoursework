<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsNumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments_nums', function (Blueprint $table) {
            $table->id()->comment('Первичный ключ');
            $table->boolean('used')->default(true)->comment('Использование');
            $table->unsignedBigInteger('equipment_id')->nullable()->comment('Часть оборудования');
            $table->unsignedBigInteger('inventory_number_id')->nullable()->comment('Инвентарный номер');
            $table->unsignedBigInteger('reason_writeoff_id')->nullable()->comment('Причина списания');
            $table->unsignedBigInteger('barcode_id')->nullable()->comment('Штрихкод формата EAN-13');
            $table->foreign('equipment_id')->references('id')->on('equipments');
            $table->foreign('inventory_number_id')->references('id')->on('inventory_numbers');
            $table->foreign('reason_writeoff_id')->references('id')->on('reasons_writeoff');
            $table->foreign('barcode_id')->references('id')->on('barcodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments_nums');
    }
}
