<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); //заголовок 'name' - имя поля, 100 колличество симолов
            $table->string('lastname', 100);
            $table->string('email', 100);
            $table->string('phone');
            $table->string('department', 100);
            $table->boolean('checkbox');
            $table->string('nameOfThesis', 255)->nullable();
            $table->text('descriptionOfThesis')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->string('bitrix_id')->nullable();

            $table->foreignId('event_id')->default(1);
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreignId('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('entries');
    }
}
