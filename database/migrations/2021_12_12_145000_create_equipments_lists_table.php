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
            $table->id();
            $table->boolean('have')->default(false);
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('list_id');
            $table->unsignedBigInteger('accepted_user_id');
            $table->foreign('accepted_user_id')->references('id')->on('users');
            $table->foreign('equipment_id')->references('id')->on('equipments');
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
