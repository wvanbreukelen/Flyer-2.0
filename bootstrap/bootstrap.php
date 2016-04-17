<?php

/**
 * Run the Flyer autoloader to get an app instance
 */

$app = require('autoload.php');

/**
 * Load all the routes specified in the app folder
 */

debugger()->point('loading_routes');
require(app_path() . 'routes.php');
debugger()->point('loading_routes_done');

/**
 * Some debugging messages
 */

debugger()->point('app_boot');
debugger()->point('end');

/**
 * Let's boot up the application so a couple of events can been triggered
 */

$app->boot();

/**
 * Shutdown the application and return the results to the user. Code under this line will not be executed!
 */

exit($app->shutdown());
