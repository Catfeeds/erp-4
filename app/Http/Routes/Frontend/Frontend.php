<?php

/**
 * Frontend Controllers
 */
get('analyze', 'FrontendController@analyze')->name('analyze');
get('/', 'FrontendController@index')->name('home');
get('constant', 'FrontendController@constant');
get('contrast', 'FrontendController@contrast');
get('instruction', 'FrontendController@instruction');
get('macros', 'FrontendController@macros');
get('manufacture', 'FrontendController@manufacture');

/**
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function ()
{
	get('dashboard', 'DashboardController@index')->name('dashboard');
	get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
	patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');
});