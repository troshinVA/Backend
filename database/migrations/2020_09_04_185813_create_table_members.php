<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100); //заголовок 'name' - имя поля, 100 колличество симолов
            $table->string('lastname', 100); // псевдоним

            $table->string('emailAddress', 100);
            
            $table->integer('phone');
            $table->string('department', 100);
            $table->boolean('checkbox');
            $table->string('nameOfThesis', 255);
            $table->text('descriptionOfThesis');

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
        Schema::dropIfExists('members');
    }
}
