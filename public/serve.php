<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

define('DS', DIRECTORY_SEPARATOR);
$stack = explode(DS, getcwd());
$array = array_pop($stack);
define('ROOT', implode(DS, $stack) . DS);

define('APP', ROOT . 'app' . DS);

require('../vendor/autoload.php');
require('../flyer/bootstrap.php');

exit();

// Code under here will not been executed!
