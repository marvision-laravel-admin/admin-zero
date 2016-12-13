<?php
 

Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
	Route::get('/','MarvisionLaravelAdmin\AdminZero\Http\Controllers\DashboardController@index')->name('dashboard');
});