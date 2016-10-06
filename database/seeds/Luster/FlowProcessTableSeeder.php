<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FlowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		if(env('DB_DRIVER') == 'mysql')
			DB::table('flow_process')->truncate();
		elseif(env('DB_DRIVER') == 'sqlite')
			DB::statement("DELETE FROM ".config('access.assigned_roles_table'));
		else //For PostgreSQL or anything else
			DB::statement("TRUNCATE TABLE ".config('access.assigned_roles_table')." CASCADE");

			$role_model = 'App\Models\Luster\Flow';
			$admin = new $role_model;
			$admin->number = '1';
			$admin->style = '{"width":121,"height":41,"color":"#0e76a8","icon":"icon-ok"}';
			$admin->remark = 'remark';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
