<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('Первичный ключ');
            $table->string('login', 30)->unique()->comment('Логин');
            $table->string('password', 60)->comment('Пароль');
            $table->unsignedBigInteger('employee_id')->nullable()->comment('Связанный сотрудник');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->rememberToken()->comment('Токен');
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
        Schema::dropIfExists('users');
    }
}
