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
            $table->id();
            $table->string('code', 14)->unique();
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('view_id')->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('config_item_id');
            $table->unsignedBigInteger('reason_writeoff_id')->nullable();
            $table->foreign('config_item_id')->references('id')->on('config_items');
            $table->foreign('view_id')->references('id')->on('views');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('reason_writeoff_id')->references('id')->on('reasons_writeoff');
            $table->boolean('using')->default(true);
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
