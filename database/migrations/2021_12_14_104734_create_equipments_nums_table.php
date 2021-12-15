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
            $table->unsignedBigInteger('reason_writeoff_id')->nullable()->comment('Причина списания');
            $table->unsignedBigInteger('barcode_id')->nullable()->comment('Штрихкод формата EAN-13');
            $table->unsignedBigInteger('employee_id')->nullable()->comment('Сотрудник использующий единицу оборудования');
            $table->foreign('equipment_id')->references('id')->on('equipments');
            $table->foreign('reason_writeoff_id')->references('id')->on('reasons_writeoff');
            $table->foreign('barcode_id')->references('id')->on('barcodes');
            $table->foreign('employee_id')->references('id')->on('employees');
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
