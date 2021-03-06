<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
    
    public function run(){

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		if(env('DB_DRIVER') == 'mysql')
			DB::table('products')->truncate();
		elseif(env('DB_DRIVER') == 'sqlite')
			DB::statement("DELETE FROM ".config('access.assigned_roles_table'));
		else //For PostgreSQL or anything else
			DB::statement("TRUNCATE TABLE ".config('access.assigned_roles_table')." CASCADE");
			
		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '1';
		$Stucture->parent_id = '';
		$Stucture->name = '电磁阀';
		$Stucture->number = '1001';
		$Stucture->unit = '组';
		$Stucture->mode = 'DW324';
		$Stucture->standard = 'FV324';
		$Stucture->type = '成品';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '1';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:18:15';
		$Stucture->updated_at = '2016-01-07 01:18:15';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '2';
		$Stucture->parent_id = '1';
		$Stucture->name = '阀座体组件';
		$Stucture->number = '1002';
		$Stucture->unit = '个';
		$Stucture->mode = 'DW324';
		$Stucture->standard = 'FV324';
		$Stucture->type = '组件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '2';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:24:07';
		$Stucture->updated_at = '2016-01-09 03:03:19';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '3';
		$Stucture->parent_id = '2';
		$Stucture->name = '堵头组件';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '组件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '2';
		$Stucture->image = '3';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:33:15';
		$Stucture->updated_at = '2016-01-09 03:06:25';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '4';
		$Stucture->parent_id = '3';
		$Stucture->name = '堵头密封圈';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '3';
		$Stucture->image = '4';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:36:40';
		$Stucture->updated_at = '2016-01-09 03:13:24';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '5';
		$Stucture->parent_id = '2';
		$Stucture->name = '过滤网';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '2';
		$Stucture->image = '5';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:37:11';
		$Stucture->updated_at = '2016-01-09 03:07:21';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '6';
		$Stucture->parent_id = '2';
		$Stucture->name = '阀头密封圈';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '4';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '2';
		$Stucture->image = '6';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:37:58';
		$Stucture->updated_at = '2016-01-09 04:29:19';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '7';
		$Stucture->parent_id = '2';
		$Stucture->name = '快接头组件';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '组件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '2';
		$Stucture->image = '7';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:38:50';
		$Stucture->updated_at = '2016-01-09 03:07:48';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '8';
		$Stucture->parent_id = '7';
		$Stucture->name = '快接头密封圈';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '8';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:39:26';
		$Stucture->updated_at = '2016-01-09 03:13:58';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '9';
		$Stucture->parent_id = '2';
		$Stucture->name = '阀座密封圈';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '2';
		$Stucture->image = '9';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:39:56';
		$Stucture->updated_at = '2016-01-09 04:29:50';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '10';
		$Stucture->parent_id = '2';
		$Stucture->name = '大垫片';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '2';
		$Stucture->image = '10';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:40:15';
		$Stucture->updated_at = '2016-01-09 04:30:14';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '11';
		$Stucture->parent_id = '1';
		$Stucture->name = '单阀';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '组件';
		$Stucture->factor = '4';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '11';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:40:50';
		$Stucture->updated_at = '2016-01-09 03:20:17';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '12';
		$Stucture->parent_id = '11';
		$Stucture->name = '线圈组件';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '组件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '5';
		$Stucture->image = '12';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:42:46';
		$Stucture->updated_at = '2016-01-09 03:20:45';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '13';
		$Stucture->parent_id = '';
		$Stucture->name = '静铁芯';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '13';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:44:28';
		$Stucture->updated_at = '2016-01-07 01:44:28';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '14';
		$Stucture->parent_id = '15';
		$Stucture->name = '动铁芯';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '11';
		$Stucture->image = '14';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:45:05';
		$Stucture->updated_at = '2016-01-09 03:15:12';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '15';
		$Stucture->parent_id = '11';
		$Stucture->name = '动铁芯组件';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '组件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '5';
		$Stucture->image = '15';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:45:27';
		$Stucture->updated_at = '2016-01-09 03:21:07';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '16';
		$Stucture->parent_id = '15';
		$Stucture->name = '动铁帽组件';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '组件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '11';
		$Stucture->image = '16';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:46:06';
		$Stucture->updated_at = '2016-01-09 03:15:44';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '17';
		$Stucture->parent_id = '16';
		$Stucture->name = '动铁帽';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '12';
		$Stucture->image = '17';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:46:30';
		$Stucture->updated_at = '2016-01-09 03:16:14';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '18';
		$Stucture->parent_id = '16';
		$Stucture->name = '缓冲垫';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '12';
		$Stucture->image = '18';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:46:57';
		$Stucture->updated_at = '2016-01-09 03:16:35';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '19';
		$Stucture->parent_id = '';
		$Stucture->name = '圆垫片';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '19';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:47:53';
		$Stucture->updated_at = '2016-01-07 01:47:53';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '20';
		$Stucture->parent_id = '';
		$Stucture->name = 'U形铁';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '20';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:48:17';
		$Stucture->updated_at = '2016-01-07 01:48:17';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '21';
		$Stucture->parent_id = '';
		$Stucture->name = '导向板';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '21';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:48:41';
		$Stucture->updated_at = '2016-01-07 01:48:41';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '22';
		$Stucture->parent_id = '11';
		$Stucture->name = '弹簧';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '22';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:49:01';
		$Stucture->updated_at = '2016-01-09 03:22:15';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '23';
		$Stucture->parent_id = '11';
		$Stucture->name = '双孔垫';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '0';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '5';
		$Stucture->image = '23';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:49:59';
		$Stucture->updated_at = '2016-01-09 03:23:31';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '24';
		$Stucture->parent_id = '1';
		$Stucture->name = '阀线－红色';
		$Stucture->number = '';
		$Stucture->unit = '根';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '2';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '24';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:51:06';
		$Stucture->updated_at = '2016-01-09 03:25:06';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '25';
		$Stucture->parent_id = '1';
		$Stucture->name = '阀线－黄色';
		$Stucture->number = '';
		$Stucture->unit = '根';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '2';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '25';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:51:52';
		$Stucture->updated_at = '2016-01-09 03:25:17';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '26';
		$Stucture->parent_id = '1';
		$Stucture->name = '阀线－绿色';
		$Stucture->number = '';
		$Stucture->unit = '根';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '2';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '26';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:52:14';
		$Stucture->updated_at = '2016-01-09 03:25:29';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '27';
		$Stucture->parent_id = '1';
		$Stucture->name = '阀线－黑色';
		$Stucture->number = '';
		$Stucture->unit = '根';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '2';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '27';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:52:39';
		$Stucture->updated_at = '2016-01-09 03:25:45';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '28';
		$Stucture->parent_id = '';
		$Stucture->name = '端子';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '28';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:53:07';
		$Stucture->updated_at = '2016-01-07 01:53:07';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '29';
		$Stucture->parent_id = '';
		$Stucture->name = '骨架';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '29';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:53:35';
		$Stucture->updated_at = '2016-01-07 01:53:35';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '30';
		$Stucture->parent_id = '';
		$Stucture->name = '大外壳';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '30';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:54:07';
		$Stucture->updated_at = '2016-01-07 01:54:07';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '31';
		$Stucture->parent_id = '';
		$Stucture->name = '小外壳';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '31';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:54:47';
		$Stucture->updated_at = '2016-01-07 01:54:47';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '32';
		$Stucture->parent_id = '35';
		$Stucture->name = '阀座';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '32';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:55:18';
		$Stucture->updated_at = '2016-01-09 03:17:04';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '33';
		$Stucture->parent_id = '35';
		$Stucture->name = 'O形圈';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '6';
		$Stucture->image = '33';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:56:02';
		$Stucture->updated_at = '2016-01-09 03:18:20';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '34';
		$Stucture->parent_id = '35';
		$Stucture->name = '异形圈';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '6';
		$Stucture->image = '34';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:56:30';
		$Stucture->updated_at = '2016-01-09 03:18:38';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '35';
		$Stucture->parent_id = '11';
		$Stucture->name = '阀座组件';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '组件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '5';
		$Stucture->image = '35';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:57:12';
		$Stucture->updated_at = '2016-01-09 03:21:55';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '36';
		$Stucture->parent_id = '11';
		$Stucture->name = '卡扣';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '2';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '5';
		$Stucture->image = '36';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:58:03';
		$Stucture->updated_at = '2016-01-09 03:22:41';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '37';
		$Stucture->parent_id = '';
		$Stucture->name = '坎件';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '';
		$Stucture->image = '37';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:58:41';
		$Stucture->updated_at = '2016-01-07 01:58:41';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '38';
		$Stucture->parent_id = '1';
		$Stucture->name = '螺钉';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '8';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '1';
		$Stucture->image = '38';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-07 01:59:08';
		$Stucture->updated_at = '2016-01-09 03:58:03';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '39';
		$Stucture->parent_id = '3';
		$Stucture->name = '堵头';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = 'DW324';
		$Stucture->standard = 'FV324';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '3';
		$Stucture->image = '39';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-09 03:10:57';
		$Stucture->updated_at = '2016-01-09 03:12:53';
		$Stucture->save();

		$role_model = 'App\Models\Luster\Stucture';
		$Stucture = new $role_model;
		$Stucture->id = '40';
		$Stucture->parent_id = '7';
		$Stucture->name = '块接头';
		$Stucture->number = '';
		$Stucture->unit = '个';
		$Stucture->mode = '';
		$Stucture->standard = '';
		$Stucture->type = '零件';
		$Stucture->factor = '1';
		$Stucture->total = '0';
		$Stucture->min = '0';
		$Stucture->max = '0';
		$Stucture->depository = '1';
		$Stucture->process = '4';
		$Stucture->image = '40';
		$Stucture->file = '';
		$Stucture->supply = '1';
		$Stucture->created_at = '2016-01-09 03:12:12';
		$Stucture->updated_at = '2016-01-09 03:13:43';
		$Stucture->save(); 

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
