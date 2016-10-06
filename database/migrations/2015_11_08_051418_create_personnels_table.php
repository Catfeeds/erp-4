<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('number')->unique();
            $table->string('name');
            $table->string('nickname');
            $table->string('gender');
            $table->string('birthday');
            $table->string('card_id');
            $table->string('matrimony');
            $table->string('native');
            $table->string('social');
            $table->string('address');
            $table->string('wechat');
            $table->string('qq');
            $table->string('email');
            $table->string('telephone');
            $table->string('college');
            $table->string('language');
            $table->string('level');
            $table->string('remark');
            $table->string('attachment');
            $table->string('picture');
            $table->string('work_date');
            $table->string('contract_date');
            $table->string('dimission_date');
            $table->string('band');
            $table->string('account');
            $table->string('passport');
            $table->string('indate');
            $table->string('blood');
            $table->string('height');
            $table->string('weight');
            $table->string('vision');
            $table->string('driver');
            $table->string('company');
            $table->string('department');
            $table->string('position');
            $table->string('type');            
            $table->string('state');            
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
        Schema::drop('personnels');
    }
}
