<?php

define('DS', DIRECTORY_SEPARATOR);
$stack = explode(DS, getcwd());
$array = array_pop($stack);
define('ROOT', implode(DS, $stack) . DS);

define('APP', ROOT . 'app' . DS);

require('../vendor/autoload.php');
require('../flyer/bootstrap.php');

exit();

// Code under here will not been executed!
