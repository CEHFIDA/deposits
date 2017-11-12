<?php

Route::group(['prefix' => config('adminamazing.path').'/deposits', 'middleware' => ['web','CheckAccess']], function() {
	Route::get('/', 'Selfreliance\Deposits\DepositsController@index')->name('AdminDeposits');
	Route::get('/history/deposit-{deposit}/user-{user}', 'Selfreliance\Deposits\DepositsController@history')->name('AdminDepositsHistory');
	Route::get('/create', 'Selfreliance\Deposits\DepositsController@create')->name('AdminDepositsCreate');
	Route::post('/create', 'Selfreliance\Deposits\DepositsController@store')->name('AdminDepositsStore');
});
