<?php

// Test Controller
Route::get('hello', 'AnotherController@hello');

Route::any('test', 'TestController@index')