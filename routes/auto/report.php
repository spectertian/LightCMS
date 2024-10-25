<?php

Route::get('/reports', 'ReportController@index')->name('report.index');
Route::get('/reports/list', 'ReportController@list')->name('report.list');
Route::get('/reports/create', 'ReportController@create')->name('report.create');
Route::post('/reports', 'ReportController@save')->name('report.save');
Route::get('/reports/{id}/edit', 'ReportController@edit')->name('report.edit');
Route::put('/reports/{id}', 'ReportController@update')->name('report.update');
Route::delete('/reports/{id}', 'ReportController@delete')->name('report.delete');
