<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('company');
            $table->char('short' , 10);
            $table->string('postalcode');
            $table->string('telephone');
            $table->string('fax');
            $table->string('address');
            $table->string('netword');
            $table->string('bank');
            $table->string('account');
            $table->string('remark');
            $table->string('type');
            $table->string('origin');
            $table->string('email')->unique();
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
        Schema::drop('clients');
    }
}
