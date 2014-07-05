<?php

// Weather
Route::get('weather', 'WeatherController@index');
Route::post('weather', 'WeatherController@handle');
Route::any('test', 'WeatherController@index');


