<?php

// Your routing file

Route::get('/hello', 'HomeController@index');
Route::get('test', 'TestController@test');
Route::get('/', 'TestController@test');