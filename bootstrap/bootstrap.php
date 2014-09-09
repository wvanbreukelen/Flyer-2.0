<?php

$app = require('autoload.php');

require(APP . 'routes.php');


/**
 * Boot the application
 */

$app->boot();

/**
 * Shutdown the application
 */

$app->shutdown();
