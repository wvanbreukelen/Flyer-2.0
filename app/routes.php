<?php

/**
 * This file contains all of the routes that will be loaded in the application
 */

Route::get('lol', 'HomeController@indexs');

Route::get('test', function () {
	return "Hello World!";
});
