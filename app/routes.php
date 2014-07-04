<?php

// Weather
Route::get('weather', 'WeatherController@index');
Route::post('weather', 'WeatherController@handle');


