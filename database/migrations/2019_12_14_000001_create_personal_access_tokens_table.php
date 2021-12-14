<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id()->comment('Первичный ключ');
            $table->morphs('tokenable');
            $table->string('name')->comment('Название токена');
            $table->string('token', 64)->unique()->comment('Токен');
            $table->text('abilities')->nullable()->comment('Права токена');
            $table->timestamp('last_used_at')->nullable()->comment('Когда был последний раз использован');
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
        Schema::dropIfExists('personal_access_tokens');
    }
}
