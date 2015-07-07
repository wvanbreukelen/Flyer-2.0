<?php

// Your routing file

Route::get('lol', 'HomeController@indexs');

Route::get('test', function () {
	return "Hello World!";
});
