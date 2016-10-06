<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockrecords', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('number'); 
            $table->string('product_number'); 
            $table->string('use'); 
            $table->string('handler');      //经手人      
            $table->string('stockhouse');
            $table->string('company');
            $table->string('quantity');
            $table->string('type');
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
        Schema::drop('stockrecords');
    }
}
