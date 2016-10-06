<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class RoleTableSeeder extends Seeder {

	public function run() {

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		if(env('DB_DRIVER') == 'mysql')
			DB::table(config('access.roles_table'))->truncate();
		elseif(env('DB_DRIVER') == 'sqlite')
			DB::statement("DELETE FROM ".config('access.roles_table'));
		else //For PostgreSQL or anything else
			DB::statement("TRUNCATE TABLE ".config('access.roles_table')." CASCADE");

		//Create admin role, id of 1
		$role_model = config('access.role');
		$admin = new $role_model;
		$admin->name = '管理员';
		$admin->all = true;
		$admin->sort = 1;
		$admin->created_at = Carbon::now();
		$admin->updated_at = Carbon::now();
		$admin->save();

		$role_model = config('access.role');
		$admin = new $role_model;
		$admin->name = '总经理';
		$admin->all = true;
		$admin->sort = 2;
		$admin->created_at = Carbon::now();
		$admin->updated_at = Carbon::now();
		$admin->save();

		$role_model = config('access.role');
		$admin = new $role_model;
		$admin->name = '财务主管';
		$admin->all = true;
		$admin->sort = 3;
		$admin->created_at = Carbon::now();
		$admin->updated_at = Carbon::now();
		$admin->save();

		$role_model = config('access.role');
		$user = new $role_model;
		$user->name = '生产主管';
		$user->sort = 4;
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		$user->save();

		$role_model = config('access.role');
		$user = new $role_model;
		$user->name = '技术支持';
		$user->sort = 5;
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		$user->save();

		$role_model = config('access.role');
		$user = new $role_model;
		$user->name = '员工';
		$user->sort = 6;
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		$user->save();

		$role_model = config('access.role');
		$user = new $role_model;
		$user->name = '客户';
		$user->sort = 7;
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		$user->save();
		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
