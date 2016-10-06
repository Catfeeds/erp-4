<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('supply');
            $table->string('contact');
            $table->string('store');
            $table->string('arrival_date');
            $table->string('number');
            $table->string('creator');
            $table->string('money');
            $table->string('remark');
            $table->string('pay_money');
            $table->string('state');
            $table->string('invoice');
            $table->string('account');
            $table->string('num');
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
        Schema::drop('purchases');
    }
}
