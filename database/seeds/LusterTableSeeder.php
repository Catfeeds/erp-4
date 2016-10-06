<?php

use Illuminate\Database\Seeder;

class LusterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		if(env('DB_DRIVER')=='mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		
		$this->call(FlowProcessTableSeeder::class);

		// $this->call(CantactTableSeeder::class);
		// $this->call(ClientTableSeeder::class);
		// $this->call(ProductTableSeeder::class);
		// $this->call(PictureTableSeeder::class);
		// $this->call(BillTableSeeder::class);
		// $this->call(PermissionDependencyTableSeeder::class);

		if(env('DB_DRIVER')=='mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
