<?php
/**
 * This file is the first PHP file that a request will encounter.
 * Make sure you do not mess it up
 *
 * Credits: wvanbreukelen licensed under MIT.
 */



/**
 * Initialize application error handling
 */


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(-1);


/**
 * Define some path constants for the application
 */


define('DS', DIRECTORY_SEPARATOR);
$stack = explode(DS, getcwd());
$array = array_pop($stack);
define('ROOT', implode(DS, $stack) . DS);
define('APP', ROOT . 'app' . DS);


/**
 * Require the composer autoloader
 */


if (!file_exists('../vendor/autoload.php'))
{
    exit("Please run composer before using Flyer!"); 
}

require('../vendor/autoload.php');


/**
 * Require the bootstrap, that bootstraps the application itself
 */


require('../bootstrap/bootstrap.php');


/**
 * Code under here will not been executed!
 */