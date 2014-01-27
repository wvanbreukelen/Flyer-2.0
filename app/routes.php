<?php

use Flyer\Components\Router\Route;

Route::get('gay', function() {
	echo 'The current page is {currentPage}';
});
Route::get('welkom', function() {
	echo '<h2>Welkom</h2><p>Welkom in deze simpele applicatie die gebruik maakt van het Flyer Framework!</p><hr />';
});

Route::get('weather', 'WeatherController@index');