<?php

/**
 * This file contains all of the routes that will be loaded in the application
 */

// The default "hello" route
Route::get('hello', 'HelloController@index');


Route::get('/', function() {
    return "Hello World!";
});
