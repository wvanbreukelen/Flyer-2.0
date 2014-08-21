<?php

$app = require('autoload.php');

/**
 * Require the route file
 */

require(APP . 'routes.php');

/**
 * Boot the application
 */

$app->boot();

/**
 * Shutdown the application
 */

$app->shutdown();
