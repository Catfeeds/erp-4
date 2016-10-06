<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientTableSeeder extends Seeder {

	public function run() {

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		if(env('DB_DRIVER') == 'mysql')
			DB::table('clients')->truncate();
		elseif(env('DB_DRIVER') == 'sqlite')
			DB::statement("DELETE FROM ".config('auth.table'));
		else //For PostgreSQL or anything else
			DB::statement("TRUNCATE TABLE ".config('auth.table')." CASCADE");

		//Add the master administrator, user id of 1
		$clients = [

			[
	            'company'    =>'空',
	            'short'      =>'空',
	            'postalcode' =>'',
	            'telephone'  =>'',
	            'fax'        =>'',
	            'address'    =>'',
	            'netword'    =>'',
	            'bank'       =>'',
	            'account'    =>'',
	            'remark'     =>'',
	            'type'       =>'供应商',
	            'origin'     =>'',
	            'email'      =>'',
			],
			[
	            'company'    =>'乔伊斯（大连）技术开发有限公司',
	            'short'      =>'乔伊斯',
	            'postalcode' =>'',
	            'telephone'  =>'0411-39264337',
	            'fax'        =>'0411-39266319',
	            'address'    =>'',
	            'netword'    =>'',
	            'bank'       =>'',
	            'account'    =>'',
	            'remark'     =>'',
	            'type'       =>'供应商',
	            'origin'     =>'',
	            'email'      =>'',
			],
			[
	            'company'    =>'大连涵亿精密有限公司',
	            'short'      =>'涵亿精密',
	            'postalcode' =>'',
	            'telephone'  =>'0411-66771681',
	            'fax'        =>'',
	            'address'    =>'',
	            'netword'    =>'',
	            'bank'       =>'',
	            'account'    =>'',
	            'remark'     =>'各种模具用的配材',
	            'type'       =>'供应商',
	            'origin'     =>'',
	            'email'      =>'',
			],
			[
	            'company'    =>'大连市甘井子区三利橡胶制品厂',
	            'short'      =>'三利橡胶',
	            'postalcode' =>'',
	            'telephone'  =>'0411-66007386',
	            'fax'        =>'0411-66007386',
	            'address'    =>'大连甘井子区辛寨子镇由家村',
	            'netword'    =>'',
	            'bank'       =>'',
	            'account'    =>'',
	            'remark'     =>'电磁阀异形橡胶圈及设备雨刷橡胶',
	            'type'       =>'供应商',
	            'origin'     =>'',
	            'email'      =>'',
			],
			[
	            'company'    =>'国泰精密机件（大连）有限公司',
	            'short'      =>'国泰精密',
	            'postalcode' =>'0411-39215222',
	            'telephone'  =>'0411-39213888',
	            'fax'        =>'',
	            'address'    =>'大连经济技术开发区湾达北路5号',
	            'netword'    =>'',
	            'bank'       =>'',
	            'account'    =>'',
	            'remark'     =>'',
	            'type'       =>'供应商',
	            'origin'     =>'',
	            'email'      =>'',
			],
			[
	            'company'    =>'大连宇宏金属有限公司',
	            'short'      =>'大连宇宏',
	            'postalcode' =>'',
	            'telephone'  =>'15842608310',
	            'fax'        =>'',
	            'address'    =>'大连开发区卧龙工业园',
	            'netword'    =>'',
	            'bank'       =>'',
	            'account'    =>'',
	            'remark'     =>'注塑模具制作及塑料件成形',
	            'type'       =>'供应商',
	            'origin'     =>'',
	            'email'      =>'',
			],
		];

		DB::table('clients')->insert($clients);

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
