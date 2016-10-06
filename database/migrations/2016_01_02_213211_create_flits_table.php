<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flits', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('number')->unique();
            $table->string('out');
            $table->string('in');
            $table->string('handler');
            $table->string('use');
            $table->string('remark');
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
        Schema::drop('flits');
    }
}
