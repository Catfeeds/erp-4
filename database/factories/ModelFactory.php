<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
		'email' => $faker->email,
		'password' => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
	];
});
$factory->define(App\Models\Luster\Bill::class, function (Faker\Generator $faker) {
	return [
	    'client'   => $faker->numberBetween($min = 1, $max = 5), 
	    'bill'     => $faker->name,
	    'content'  => $faker->text,
	    'type'     => $faker->name,
	    'date'     => $faker->date($format = 'Y-m-d', $max = 'now'),
	    'money'    => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
	    'number'   => $faker->randomDigit , 
	    'drawer'   => $faker->name,
	    'remark'   => $faker->sentence($nbWords = 6),
	];
});