<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('number')->unique();
            $table->string('type');
            $table->string('department');
            $table->string('worker');
            $table->string('norm');
            $table->string('num');
            $table->string('money');
            $table->string('price');
            $table->string('unit');
            $table->string('address');
            $table->string('bill');
            $table->string('remark');
            $table->string('reator');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipments');
    }
}
