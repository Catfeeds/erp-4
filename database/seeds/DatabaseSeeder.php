<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		Model::unguard();

		if(env('DB_DRIVER')=='mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		// $this->call(FlowProcessTableSeeder::class);
		// $this->call(AccessTableSeeder::class);
		// $this->call(CantactTableSeeder::class);
		// $this->call(ClientTableSeeder::class);
		// $this->call(ProductTableSeeder::class);
		// $this->call(PictureTableSeeder::class);
		// $this->call(LusterTableSeeder::class);
		// $this->call(TestSeeder::class);

		if(env('DB_DRIVER')=='mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		Model::reguard();
	}
}
