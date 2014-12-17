<?php

$app = require('autoload.php');

$app->debugger()->point('loading_routes');

require(APP . 'routes.php');

$app->debugger()->point('loading_routes_done');

$app->debugger()->point('app_boot');
$app->debugger()->point('end');


/**
 * Boot the application
 */

$app->boot();

/**
 * Shutdown the application
 */

$app->shutdown();
