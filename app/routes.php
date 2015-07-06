<?php

// Your routing file

Route::get('lol', 'HomeController@index');

Route::get('test', function () {
	return "Hello World!";
});
