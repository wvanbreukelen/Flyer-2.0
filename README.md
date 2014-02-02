Flyer
=========

A simple to use PHP framework

### Notes
* This framework uses the MVC pattern
* This framework is in development, expect some (major) bugs
* This framework is inspired by Laravel
* This part of the framework is in alpha status

### Installation

It's very easy to install the Flyer Framework!
Steps:

1. Clone this repository, the master or alpha branch.
2. Open a command window (Terminal, CMD, etc.) and type
```bash
composer update
```
This will install the required dependencies and generate the autoload files
3. Done, enjoy!

### Routing

The Routing component in the Flyer Framework make it easy to create route. it is inspired by Taylot Otwell's Laravel Routing engine. You specify your routes in the routes.php file (located in the app folder) 
Below some examples:

###### GET route
```php
Route::get('', 'WeatherController@index');
```

###### POST route
```php
Route::post('', 'WeatherController@index');
```

###### UPDATE route
```php
Route::update('', 'WeatherController@index');
```

###### DELETE route
```php
Route::delete('', 'WeatherController@index');
```

So it is possible that your routes file looks like this

```php
<?php

use Flyer\Components\Router\Route;

// Weather
Route::get('weather', 'WeatherController@weather');
Route::post('weather', 'WeatherController@handle');

// Index
Route::get('', 'WeatherController@index');

```

### Controllers

Your controller has to extend the BaseController, which is located in app/controllers/BaseController.php
You are free to edit the BaseController as anything you like, but always extend it in your own controller!

Example of a well written controller

```php
<?php

class SampleController extends BaseController
{
	public function index()
	{
		return "Hi! I'm the weather controller index method";
	}

	public function handle()
	{
		return "Hey, you used the POST method!";
	}

	public function weather()
	{
		return "You use the GET method";
	}
}
```

### Models

I'm going to add this section later, stay tuned!

### Views

Your views display the grapical user interface (GUI) to the user. We used the Twig Templating engine, so we recommend to take a look here: http://twig.sensiolabs.org/documentation

### Contributing

You are free to contribute, as long you stick to the Symfony rules. 
Please create a pull request and I will take a look at it.

### Questions

If you have any questions, feel free to contact me!






