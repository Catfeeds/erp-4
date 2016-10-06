<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('number')->unique();
            $table->string('stage');
            $table->string('remark');
            $table->string('client');
            $table->string('contact');
            $table->string('content');
            $table->string('method');
            $table->string('type');
            $table->string('verify');
            $table->string('approver');
            $table->string('attachment');
            $table->string('creator');
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
        Schema::drop('services');
    }
}
