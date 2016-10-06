<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistics_invoices', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('client');
            $table->string('number');
            $table->string('product');
            $table->string('quantity');
            $table->string('contact');
            $table->string('operator');
            $table->string('telephone');
            $table->string('address');
            $table->string('carrier');
            $table->string('state');
            $table->string('package');
            $table->string('weight');
            $table->string('fare');
            $table->string('remak');
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
        Schema::drop('invoices');
    }
}
