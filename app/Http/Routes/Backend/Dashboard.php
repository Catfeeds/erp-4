<?php

get('dashboard', 'DashboardController@index')->name('backend.dashboard');
Route::controller('dashboard', 'DashboardController');  

