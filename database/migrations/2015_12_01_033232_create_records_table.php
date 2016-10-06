<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('product_number');
            $table->string('name');
            $table->string('type');
            $table->string('standard');
            $table->string('stock_number');            //出入库记录编号
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
        Schema::drop('records');
    }
}
