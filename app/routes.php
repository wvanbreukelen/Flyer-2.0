<?php

// Your routing file

Route::get('/', 'HomeController@index');

Route::get('test', function () {
	return "Hello World!";
});