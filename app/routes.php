<?php

use Flyer\Components\Router\Route;

// Weather
Route::get('weather', 'WeatherController@index');
Route::post('weather', 'WeatherController@handle');


