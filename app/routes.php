<?php

use Flyer\Components\Router\Route;

// Weather
Route::get('weather', 'WeatherController@weather');
Route::post('weather', 'WeatherController@handle');

// Index
Route::get('', 'WeatherController@index');


