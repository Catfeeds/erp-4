<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('parent_id');
            $table->string('number')->unique();
            $table->string('unit');
            $table->string('mode');
            $table->string('standard');
            $table->string('type');
            $table->string('total');
            $table->string('factor');
            $table->string('min');
            $table->string('max');
            $table->string('depository');
            $table->string('process');
            $table->string('image');
            $table->string('file');
            $table->string('supply');
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
        Schema::drop('products');
    }
}
