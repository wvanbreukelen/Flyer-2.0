<?php

/**
 * This file is the first PHP file that a request will encounter.
 * It's called a front controller!
 * Make sure you do not mess it up, otherwise your app can broke!
 *
 * Credits: wvanbreukelen
 * License: MIT
 */

define('AUTOLOADER_LOC', '../vendor/autoload.php');
define('BOOTSTRAP_LOC', '../bootstrap/bootstrap.php');

/**
 * Initialize application (fatal) error handling
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(-1);

/**
 * Check if the composer autoloader file exists
 */

if (!file_exists(AUTOLOADER_LOC))
{
    throw new RuntimeException("Composer autoloader was not found, path: " . AUTOLOADER_LOC);
}

/**
 * Require the composer autoloader
 */

require(AUTOLOADER_LOC);

/**
 * Require the bootstrap, that bootstraps the application itself
 * This is the final step in bootstrapping the app
 */

require(BOOTSTRAP_LOC);
