<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CantactTableSeeder extends Seeder
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
			DB::table('personnels')->truncate();
		elseif(env('DB_DRIVER') == 'sqlite')
			DB::statement("DELETE FROM ".config('access.assigned_roles_table'));
		else //For PostgreSQL or anything else
			DB::statement("TRUNCATE TABLE ".config('access.assigned_roles_table')." CASCADE");

			$role_model = 'App\Models\Luster\Contact';
			$admin = new $role_model;
			$admin->name = '沈成龙';
			$admin->gender = '男';
			$admin->telephone = '15842608310';
			$admin->email = '';
			$admin->company = '5';
			$admin->position = '';
			$admin->type = '供应商';
			$admin->remark = '';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

			$role_model = 'App\Models\Luster\Contact';
			$admin = new $role_model;
			$admin->name = '陈建飞';
			$admin->gender = '男';
			$admin->telephone = '13941137957';
			$admin->email = '';
			$admin->company = '1';
			$admin->position = '总经理';
			$admin->type = '供应商';
			$admin->remark = '';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

			$role_model = 'App\Models\Luster\Contact';
			$admin = new $role_model;
			$admin->name = '许运峰';
			$admin->gender = '男';
			$admin->telephone = '15842608310';
			$admin->email = '';
			$admin->company = '4';
			$admin->position = '业务经理';
			$admin->type = '供应商';
			$admin->remark = '';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

			$role_model = 'App\Models\Luster\Contact';
			$admin = new $role_model;
			$admin->name = '赵延安';
			$admin->gender = '男';
			$admin->telephone = '13941137957';
			$admin->email = '';
			$admin->company = '3';
			$admin->position = '经理';
			$admin->type = '供应商';
			$admin->remark = '';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

			$role_model = 'App\Models\Luster\Contact';
			$admin = new $role_model;
			$admin->name = '徐德春';
			$admin->gender = '男';
			$admin->telephone = '13889625501';
			$admin->email = 'dalianchoice@163.com';
			$admin->company = '1';
			$admin->position = '副总经理';
			$admin->type = '供应商';
			$admin->remark = '模具修整';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

			$role_model = 'App\Models\Luster\Contact';
			$admin = new $role_model;
			$admin->name = '付伟云';
			$admin->gender = '男';
			$admin->telephone = '18909851997';
			$admin->email = 'dl-hanyijingmi@163.com';
			$admin->qq = '48052824';
			$admin->company = '2';
			$admin->position = '业务经理';
			$admin->type = '供应商';
			$admin->remark = '';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

			$role_model = 'App\Models\Luster\Contact';
			$admin = new $role_model;
			$admin->name = '马秋先';
			$admin->gender = '女';
			$admin->telephone = '13700116687';
			$admin->email = 'dalianchoice@163.com';
			$admin->qq = '48052824';
			$admin->company = '1';
			$admin->position = '技术质量经理';
			$admin->type = '供应商';
			$admin->remark = '';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

			$role_model = 'App\Models\Luster\Contact';
			$admin = new $role_model;
			$admin->name = '陈飞';
			$admin->gender = '男';
			$admin->telephone = '13739274956';
			$admin->email = '467628171@qq.com';
			$admin->company = '';
			$admin->qq = '467628171';
			$admin->position = '现场工程师';
			$admin->type = '供应商';
			$admin->remark = '';
			$admin->created_at = Carbon::now();
			$admin->updated_at = Carbon::now();
			$admin->save();

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
