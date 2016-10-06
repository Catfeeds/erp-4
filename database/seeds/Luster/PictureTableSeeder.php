<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PictureTableSeeder extends Seeder
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
			DB::table('pictures')->truncate();
		elseif(env('DB_DRIVER') == 'sqlite')
			DB::statement("DELETE FROM ".config('access.assigned_roles_table'));
		else //For PostgreSQL or anything else
			DB::statement("TRUNCATE TABLE ".config('access.assigned_roles_table')." CASCADE");
        
        $role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '电磁阀';
		$product->small = '/uploads/product/image/small/7dedb9fa297104570d0b12e21af9e1bb.jpg';
		$product->logo = '/uploads/product/image/logo/7dedb9fa297104570d0b12e21af9e1bb.jpg';
		$product->big = '/uploads/product/image/big/7dedb9fa297104570d0b12e21af9e1bb.jpg';
		$product->source = '/uploads/product/image/7dedb9fa297104570d0b12e21af9e1bb.jpg';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();
        
		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '底座体组件';
		$product->small = '/uploads/product/image/small/311f5e7aeefddec39d6a9385bfa2dc17.png';
		$product->logo = '/uploads/product/image/logo/311f5e7aeefddec39d6a9385bfa2dc17.png';
		$product->big = '/uploads/product/image/big/311f5e7aeefddec39d6a9385bfa2dc17.png';
		$product->source = '/uploads/product/image/311f5e7aeefddec39d6a9385bfa2dc17.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '堵头组件';
		$product->small = '/uploads/product/image/small/6319a18b2f7ce67af9075ae22f0f81aa.png';
		$product->logo = '/uploads/product/image/logo/6319a18b2f7ce67af9075ae22f0f81aa.png';
		$product->big = '/uploads/product/image/big/6319a18b2f7ce67af9075ae22f0f81aa.png';
		$product->source = '/uploads/product/image/6319a18b2f7ce67af9075ae22f0f81aa.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '堵头密封圈';
		$product->small = '/uploads/product/image/small/eccbc87e4b5ce2fe28308fd9f2a7baf3.png';
		$product->logo = '/uploads/product/image/logo/eccbc87e4b5ce2fe28308fd9f2a7baf3.png';
		$product->big = '/uploads/product/image/big/eccbc87e4b5ce2fe28308fd9f2a7baf3.png';
		$product->source = '/uploads/product/image/eccbc87e4b5ce2fe28308fd9f2a7baf3.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '过滤网';
		$product->small = '/uploads/product/image/small/22a9cf24600025b5379f930949301033.png';
		$product->logo = '/uploads/product/image/logo/22a9cf24600025b5379f930949301033.png';
		$product->big = '/uploads/product/image/big/22a9cf24600025b5379f930949301033.png';
		$product->source = '/uploads/product/image/22a9cf24600025b5379f930949301033.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '阀头密封圈';
		$product->small = '/uploads/product/image/small/eccbc87e4b5ce2fe28308fd9f2a7baf3.png';
		$product->logo = '/uploads/product/image/logo/eccbc87e4b5ce2fe28308fd9f2a7baf3.png';
		$product->big = '/uploads/product/image/big/eccbc87e4b5ce2fe28308fd9f2a7baf3.png';
		$product->source = '/uploads/product/image/eccbc87e4b5ce2fe28308fd9f2a7baf3.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '快接头组件';
		$product->small = '/uploads/product/image/small/65fd2c2b24246fc9d5fd445ab8fb6fdb.png';
		$product->logo = '/uploads/product/image/logo/65fd2c2b24246fc9d5fd445ab8fb6fdb.png';
		$product->big = '/uploads/product/image/big/65fd2c2b24246fc9d5fd445ab8fb6fdb.png';
		$product->source = '/uploads/product/image/65fd2c2b24246fc9d5fd445ab8fb6fdb.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '快接头密封圈';
		$product->small = '/uploads/product/image/small/f7fd55dec7d8c83c8ee878f6172c3d4d.png';
		$product->logo = '/uploads/product/image/logo/f7fd55dec7d8c83c8ee878f6172c3d4d.png';
		$product->big = '/uploads/product/image/big/f7fd55dec7d8c83c8ee878f6172c3d4d.png';
		$product->source = '/uploads/product/image/f7fd55dec7d8c83c8ee878f6172c3d4d.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '阀座体密封圈';
		$product->small = '/uploads/product/image/small/a7e5cf02cd9f4e5abe61e844e50d9c91.png';
		$product->logo = '/uploads/product/image/logo/a7e5cf02cd9f4e5abe61e844e50d9c91.png';
		$product->big = '/uploads/product/image/big/a7e5cf02cd9f4e5abe61e844e50d9c91.png';
		$product->source = '/uploads/product/image/a7e5cf02cd9f4e5abe61e844e50d9c91.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '大垫片';
		$product->small = '/uploads/product/image/small/5893f6ff68257ffb2a44328e51586c9f.png';
		$product->logo = '/uploads/product/image/logo/5893f6ff68257ffb2a44328e51586c9f.png';
		$product->big = '/uploads/product/image/big/5893f6ff68257ffb2a44328e51586c9f.png';
		$product->source = '/uploads/product/image/5893f6ff68257ffb2a44328e51586c9f.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '单阀';
		$product->small = '/uploads/product/image/small/d93e78715ae92cf289f4f0b9c1a93dc0.png';
		$product->logo = '/uploads/product/image/logo/d93e78715ae92cf289f4f0b9c1a93dc0.png';
		$product->big = '/uploads/product/image/big/d93e78715ae92cf289f4f0b9c1a93dc0.png';
		$product->source = '/uploads/product/image/d93e78715ae92cf289f4f0b9c1a93dc0.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '线圈组件';
		$product->small = '/uploads/product/image/small/7915fb0ab1355e5c72cc4f1d5c81d2e6.png';
		$product->logo = '/uploads/product/image/logo/7915fb0ab1355e5c72cc4f1d5c81d2e6.png';
		$product->big = '/uploads/product/image/big/7915fb0ab1355e5c72cc4f1d5c81d2e6.png';
		$product->source = '/uploads/product/image/7915fb0ab1355e5c72cc4f1d5c81d2e6.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '静铁芯';
		$product->small = '/uploads/product/image/small/b5c9f4fe99f5eb673aa44d45c85d7c47.png';
		$product->logo = '/uploads/product/image/logo/b5c9f4fe99f5eb673aa44d45c85d7c47.png';
		$product->big = '/uploads/product/image/big/b5c9f4fe99f5eb673aa44d45c85d7c47.png';
		$product->source = '/uploads/product/image/b5c9f4fe99f5eb673aa44d45c85d7c47.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '动铁芯';
		$product->small = '/uploads/product/image/small/b478cebbc3bf6d05c90dd78b93db167c.png';
		$product->logo = '/uploads/product/image/logo/b478cebbc3bf6d05c90dd78b93db167c.png';
		$product->big = '/uploads/product/image/big/b478cebbc3bf6d05c90dd78b93db167c.png';
		$product->source = '/uploads/product/image/b478cebbc3bf6d05c90dd78b93db167c.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '动铁芯组件';
		$product->small = '/uploads/product/image/small/a5f8d75d88784a608804d754bab66945.png';
		$product->logo = '/uploads/product/image/logo/a5f8d75d88784a608804d754bab66945.png';
		$product->big = '/uploads/product/image/big/a5f8d75d88784a608804d754bab66945.png';
		$product->source = '/uploads/product/image/a5f8d75d88784a608804d754bab66945.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '缓冲垫组件';
		$product->small = '/uploads/product/image/small/6075555d2a4588fb44e16a66b961d03d.png';
		$product->logo = '/uploads/product/image/logo/6075555d2a4588fb44e16a66b961d03d.png';
		$product->big = '/uploads/product/image/big/6075555d2a4588fb44e16a66b961d03d.png';
		$product->source = '/uploads/product/image/6075555d2a4588fb44e16a66b961d03d.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '动铁帽';
		$product->small = '/uploads/product/image/small/d2bbf5972e56b2ea27b577e8b5fa6f60.png';
		$product->logo = '/uploads/product/image/logo/d2bbf5972e56b2ea27b577e8b5fa6f60.png';
		$product->big = '/uploads/product/image/big/d2bbf5972e56b2ea27b577e8b5fa6f60.png';
		$product->source = '/uploads/product/image/d2bbf5972e56b2ea27b577e8b5fa6f60.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '缓冲垫';
		$product->small = '/uploads/product/image/small/a73858b30db5c760c0ee2bd392ff1448.png';
		$product->logo = '/uploads/product/image/logo/a73858b30db5c760c0ee2bd392ff1448.png';
		$product->big = '/uploads/product/image/big/a73858b30db5c760c0ee2bd392ff1448.png';
		$product->source = '/uploads/product/image/a73858b30db5c760c0ee2bd392ff1448.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '圆垫片';
		$product->small = '/uploads/product/image/small/100b7fdf4ffb69b2c652a7b8fdff100f.png';
		$product->logo = '/uploads/product/image/logo/100b7fdf4ffb69b2c652a7b8fdff100f.png';
		$product->big = '/uploads/product/image/big/100b7fdf4ffb69b2c652a7b8fdff100f.png';
		$product->source = '/uploads/product/image/100b7fdf4ffb69b2c652a7b8fdff100f.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = 'U形铁';
		$product->small = '/uploads/product/image/small/f625a1659b9eae885e54e236c4bf7311.png';
		$product->logo = '/uploads/product/image/logo/f625a1659b9eae885e54e236c4bf7311.png';
		$product->big = '/uploads/product/image/big/f625a1659b9eae885e54e236c4bf7311.png';
		$product->source = '/uploads/product/image/f625a1659b9eae885e54e236c4bf7311.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '导向板';
		$product->small = '/uploads/product/image/small/0ab12fc35ec8896ff211b38abc14fcb8.png';
		$product->logo = '/uploads/product/image/logo/0ab12fc35ec8896ff211b38abc14fcb8.png';
		$product->big = '/uploads/product/image/big/0ab12fc35ec8896ff211b38abc14fcb8.png';
		$product->source = '/uploads/product/image/0ab12fc35ec8896ff211b38abc14fcb8.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '弹簧';
		$product->small = '/uploads/product/image/small/58c361b2e9b53825b0d1f54bd5e17e94.png';
		$product->logo = '/uploads/product/image/logo/58c361b2e9b53825b0d1f54bd5e17e94.png';
		$product->big = '/uploads/product/image/big/58c361b2e9b53825b0d1f54bd5e17e94.png';
		$product->source = '/uploads/product/image/58c361b2e9b53825b0d1f54bd5e17e94.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '双孔垫';
		$product->small = '/uploads/product/image/small/d8ee5ee5b1c9d607d519dff226913fc7.png';
		$product->logo = '/uploads/product/image/logo/d8ee5ee5b1c9d607d519dff226913fc7.png';
		$product->big = '/uploads/product/image/big/d8ee5ee5b1c9d607d519dff226913fc7.png';
		$product->source = '/uploads/product/image/d8ee5ee5b1c9d607d519dff226913fc7.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '黄阀线';
		$product->small = '/uploads/product/image/small/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->logo = '/uploads/product/image/logo/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->big = '/uploads/product/image/big/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->source = '/uploads/product/image/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '绿阀线';
		$product->small = '/uploads/product/image/small/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->logo = '/uploads/product/image/logo/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->big = '/uploads/product/image/big/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->source = '/uploads/product/image/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '红阀线';
		$product->small = '/uploads/product/image/small/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->logo = '/uploads/product/image/logo/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->big = '/uploads/product/image/big/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->source = '/uploads/product/image/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '黑阀线';
		$product->small = '/uploads/product/image/small/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->logo = '/uploads/product/image/logo/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->big = '/uploads/product/image/big/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->source = '/uploads/product/image/56a67fa9d28af0679b6f94d45d02ad81.jpg';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '端子';
		$product->small = '/uploads/product/image/small/a6922577aac8730dea27760010ce98a2.jpg';
		$product->logo = '/uploads/product/image/logo/a6922577aac8730dea27760010ce98a2.jpg';
		$product->big = '/uploads/product/image/big/a6922577aac8730dea27760010ce98a2.jpg';
		$product->source = '/uploads/product/image/a6922577aac8730dea27760010ce98a2.jpg';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '骨架';
		$product->small = '/uploads/product/image/small/75871c30c714217aa70a1c743601851b.png';
		$product->logo = '/uploads/product/image/logo/75871c30c714217aa70a1c743601851b.png';
		$product->big = '/uploads/product/image/big/75871c30c714217aa70a1c743601851b.png';
		$product->source = '/uploads/product/image/75871c30c714217aa70a1c743601851b.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '大外壳';
		$product->small = '/uploads/product/image/small/f4f18724cb63a44b41ea08dd98a53835.png';
		$product->logo = '/uploads/product/image/logo/f4f18724cb63a44b41ea08dd98a53835.png';
		$product->big = '/uploads/product/image/big/f4f18724cb63a44b41ea08dd98a53835.png';
		$product->source = '/uploads/product/image/f4f18724cb63a44b41ea08dd98a53835.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '小外壳';
		$product->small = '/uploads/product/image/small/059ef7512628939514f6c4a8d3d5d937.png';
		$product->logo = '/uploads/product/image/logo/059ef7512628939514f6c4a8d3d5d937.png';
		$product->big = '/uploads/product/image/big/059ef7512628939514f6c4a8d3d5d937.png';
		$product->source = '/uploads/product/image/059ef7512628939514f6c4a8d3d5d937.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '底座';
		$product->small = '/uploads/product/image/small/147ab9a59a08e3700421933f26b58576.png';
		$product->logo = '/uploads/product/image/logo/147ab9a59a08e3700421933f26b58576.png';
		$product->big = '/uploads/product/image/big/147ab9a59a08e3700421933f26b58576.png';
		$product->source = '/uploads/product/image/147ab9a59a08e3700421933f26b58576.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = 'O封圈';
		$product->small = '/uploads/product/image/small/096531da62f91284ad0e625bbd5d50e5.png';
		$product->logo = '/uploads/product/image/logo/096531da62f91284ad0e625bbd5d50e5.png';
		$product->big = '/uploads/product/image/big/096531da62f91284ad0e625bbd5d50e5.png';
		$product->source = '/uploads/product/image/096531da62f91284ad0e625bbd5d50e5.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '异形圈';
		$product->small = '/uploads/product/image/small/02cbc34d9740c1af4b66952382dcbecb.png';
		$product->logo = '/uploads/product/image/logo/02cbc34d9740c1af4b66952382dcbecb.png';
		$product->big = '/uploads/product/image/big/02cbc34d9740c1af4b66952382dcbecb.png';
		$product->source = '/uploads/product/image/02cbc34d9740c1af4b66952382dcbecb.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '阀座组件';
		$product->small = '/uploads/product/image/small/d509b24ff8c33c7070688d8ecd4c7466.png';
		$product->logo = '/uploads/product/image/logo/d509b24ff8c33c7070688d8ecd4c7466.png';
		$product->big = '/uploads/product/image/big/d509b24ff8c33c7070688d8ecd4c7466.png';
		$product->source = '/uploads/product/image/d509b24ff8c33c7070688d8ecd4c7466.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '卡扣';
		$product->small = '/uploads/product/image/small/fea79817be82dcbcd4a892abf029eb22.png';
		$product->logo = '/uploads/product/image/logo/fea79817be82dcbcd4a892abf029eb22.png';
		$product->big = '/uploads/product/image/big/fea79817be82dcbcd4a892abf029eb22.png';
		$product->source = '/uploads/product/image/fea79817be82dcbcd4a892abf029eb22.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '坎件';
		$product->small = '/uploads/product/image/small/12334c554781c6b76f989c7e0a1a29ce.png';
		$product->logo = '/uploads/product/image/logo/12334c554781c6b76f989c7e0a1a29ce.png';
		$product->big = '/uploads/product/image/big/12334c554781c6b76f989c7e0a1a29ce.png';
		$product->source = '/uploads/product/image/12334c554781c6b76f989c7e0a1a29ce.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();

		$role_model = 'App\Models\Luster\Picture';
		$product = new $role_model;
		$product->name = '螺钉';
		$product->small = '/uploads/product/image/small/ac2f930b293c5312edfcbd84e36113d6.png';
		$product->logo = '/uploads/product/image/logo/ac2f930b293c5312edfcbd84e36113d6.png';
		$product->big = '/uploads/product/image/big/ac2f930b293c5312edfcbd84e36113d6.png';
		$product->source = '/uploads/product/image/ac2f930b293c5312edfcbd84e36113d6.png';
		$product->created_at = Carbon::now();
		$product->updated_at = Carbon::now();
		$product->save();




		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
