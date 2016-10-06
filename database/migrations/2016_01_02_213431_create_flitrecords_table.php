<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlitrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flitrecords', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('number');
            $table->string('product_number');
            $table->string('quantity');
            $table->string('unit');
            $table->string('price');
            $table->string('sum');
            $table->string('use');
            $table->string('state');
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
        Schema::drop('flitrecords');
    }
}
