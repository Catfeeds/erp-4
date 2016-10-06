<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotepricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quoteprices', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('supply');
            $table->string('product');
            $table->string('price');
            $table->string('date');
            $table->string('cycle');
            $table->string('attachment');
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
        Schema::drop('quoteprices');
    }
}
