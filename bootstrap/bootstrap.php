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
 * Some debug messages...
 */

$app->debugger()->point('app_boot');
$app->debugger()->point('end');


/**
 * Let's boot up the application so a couple of events can been triggered
 */

$app->boot();

/**
 * Shutdown the application and return the results to the user.
 */

exit($app->shutdown());
