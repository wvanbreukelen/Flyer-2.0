<?php

/**
 * Run the Flyer autoloader to get a app instance
 */

$app = require('autoload.php');

/**
 * Load all the routes specified in the app folder
 */

$app->debugger()->point('loading_routes');
require(app_path() . 'routes.php');
$app->debugger()->point('loading_routes_done');

/**
 * Some debugging messages
 */

$app->debugger()->point('app_boot');
$app->debugger()->point('end');

/**
 * Let's boot up the application so a couple of events can been triggered
 */

$app->boot();

/**
 * If you want to call in some stuff before the final response is return, please add it here
 */

/**
 * Shutdown the application and return the results to the user. Code under this line will not be executed!
 */

echo $app->shutdown();

exit();
